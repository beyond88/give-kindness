<?php
namespace Give_Kindness\API;

use Give\Donations\ListTable\DonationsListTable;
use Give\Donations\ValueObjects\DonationMetaKeys;
use Give\Donations\ValueObjects\DonationMode;
use Give\Framework\Database\DB;
use Give\Framework\ListTable\Exceptions\ColumnIdCollisionException;
use Give\Framework\QueryBuilder\QueryBuilder;
use WP_REST_Request;
use WP_REST_Response;

class Donations {

    /**
     * @var WP_REST_Request
     */
    public $request;

    /**
     * @var DonationsListTable
     */
    public $listTable;

    public function __construct( $request ) {
        
        $this->request = $request;
    }

    /**
     * @since 2.24.0 Change this to use the new ListTable class
     * @since      2.20.0
     *
     * @param WP_REST_Request $request
     *
     * @return WP_REST_Response
     * @throws ColumnIdCollisionException
     */
    public function handleRequest() {

        // return $this->request; 
        $form_id = $this->request['form'];
        $this->listTable = give(DonationsListTable::class);

        $donations = $this->getDonations();
        $donationsCount = $this->getTotalDonationsCount();
        $totalPages = (int)ceil($donationsCount / $this->request['perPage']);

        if ('model' === $this->request['return']) {
            $items = $donations;
        } else {
            $this->listTable->items($donations, $this->request['locale'] ?? '');
            $items = $this->listTable->getItems();
        }

        $output = '';

        if( ! empty( $items ) ) {
            foreach( $items as $item ) {
                
                $id = $item['id'];
                $total_donation = give_get_meta( $id, '_give_payment_total', true );
                $tip_amount = !empty( give_get_meta( $id, '_give_tip_amount', true ) ) ? give_get_meta( $id, '_give_tip_amount', true ): 0;
                $fee = !empty( give_get_meta( $id, '_give_fee_amount', true ) ) ? give_get_meta( $id, '_give_fee_amount', true ): 0;
                if( isset($tip_amount) ) {
                    $total_donation = $total_donation - $tip_amount;
                }

                if( isset($fee) ) {
                    $total_donation = $total_donation - $fee;
                }

                $total_donation = give_currency_filter( give_format_amount( $total_donation, [ 'sanitize' => false ] ), [ 'currency_code' => give_get_currency( $item['id'] ) ] );

                $output .='<div class="give-donor-dashboard-table__row">
                    <div class="give-donor-dashboard-table__column">'.$item['id'].'</div>
                    <div class="give-donor-dashboard-table__column">'.Strip_tags($item['donor']).'</div>
                    <div class="give-donor-dashboard-table__column">'.$total_donation.'</div>
                    <div class="give-donor-dashboard-table__column">'.Strip_tags($item['gateway']).'</div>
                    <div class="give-donor-dashboard-table__column give-kindness-capitalize">'.Strip_tags($item['paymentType']).'</div>
                    <div class="give-donor-dashboard-table__column">
                        <div class="give-donor-dashboard-table__donation-date">'.$item['createdAt'].'</div>
                    </div>
                </div>';
            }
        } else {
            $output .='<div class="give-donor-dashboard-table__row">
                    <div class="give-donor-dashboard-table__column give-kindness-text-center">'.__("You did not get any donations yet", "give-kindness").'</div>
                </div>';
        }

        return $output; 
        // return 
        //     [
        //         'items' => $items,
        //         'totalItems' => $donationsCount,
        //         'totalPages' => $totalPages,
        //     ]
        // ;
    }

    /**
     * @since 2.24.0 Replace Query Builder with Donations model
     * @since 2.21.0
     *
     * @return array
     */
    public function getDonations(): array {
        $page = $this->request['page'];
        $perPage = $this->request['perPage'];
        $sortColumns = $this->listTable->getSortColumnById($this->request['sortColumn'] ?: 'id');
        $sortDirection = $this->request['sortDirection'] ?: 'desc';

        $query = give()->donations->prepareQuery();
        list($query) = $this->getWhereConditions($query);

        foreach ($sortColumns as $sortColumn) {
            $query->orderBy($sortColumn, $sortDirection);
        }

        $query->limit($perPage)
            ->offset(($page - 1) * $perPage);

        $donations = $query->getAll();

        if (!$donations) {
            return [];
        }

        return $donations;
    }

    /**
     * @since 2.24.0 Replace Query Builder with Donations model
     * @since 2.21.0
     *
     * @return int
     */
    public function getTotalDonationsCount(): int {
        $query = DB::table('posts')
            ->where('post_type', 'give_payment')
            ->groupBy('mode');

        list($query, $dependencies) = $this->getWhereConditions($query);

        $query->attachMeta(
            'give_donationmeta',
            'ID',
            'donation_id',
            ...DonationMetaKeys::getColumnsForAttachMetaQueryFromArray($dependencies)
        );

        return $query->count();
    }

    /**
     * @since 2.24.0 Remove joins as it uses ModelQueryBuilder and change clauses to use attach_meta
     * @since      2.21.0
     *
     * @param QueryBuilder $query
     *
     * @return array{0: QueryBuilder, 1: array<DonationMetaKeys>}
     */
    private function getWhereConditions(QueryBuilder $query): array {
        $search = $this->request['search'];
        $start = $this->request['start'];
        $end = $this->request['end'];
        $form = $this->request['form'];
        $donor = $this->request['donor'];
        $testMode = $this->request['testMode'];

        $dependencies = [
            DonationMetaKeys::MODE(),
        ];

        $hasWhereConditions = $search || $start || $end || $form || $donor;

        if ($search) {
            if (ctype_digit($search)) {
                $query->where('id', $search);
            } elseif (strpos($search, '@') !== false) {
                $query
                    ->whereLike('give_donationmeta_attach_meta_email.meta_value', $search);
                $dependencies[] = DonationMetaKeys::EMAIL();
            } else {
                $query
                    ->whereLike('give_donationmeta_attach_meta_firstName.meta_value', $search)
                    ->orWhereLike('give_donationmeta_attach_meta_lastName.meta_value', $search);
                $dependencies[] = DonationMetaKeys::FIRST_NAME();
                $dependencies[] = DonationMetaKeys::LAST_NAME();
            }
        }

        if ($donor) {
            if (ctype_digit($donor)) {
                $query
                    ->where('give_donationmeta_attach_meta_donorId.meta_value', $donor);
                $dependencies[] = DonationMetaKeys::DONOR_ID();
            } else {
                $query
                    ->whereLike('give_donationmeta_attach_meta_firstName.meta_value', $donor)
                    ->orWhereLike('give_donationmeta_attach_meta_lastName.meta_value', $donor);
                $dependencies[] = DonationMetaKeys::FIRST_NAME();
                $dependencies[] = DonationMetaKeys::LAST_NAME();
            }
        }

        if ($form) {
            $query
                ->where('give_donationmeta_attach_meta_formId.meta_value', $form);
            $dependencies[] = DonationMetaKeys::FORM_ID();
        }

        if ($start && $end) {
            $query->whereBetween('post_date', $start, $end);
        } elseif ($start) {
            $query->where('post_date', $start, '>=');
        } elseif ($end) {
            $query->where('post_date', $end, '<=');
        }

        if ($hasWhereConditions) {
            $query->having('give_donationmeta_attach_meta_mode.meta_value', '=', $testMode ? DonationMode::TEST : DonationMode::LIVE);
        } else {
            $query->where('give_donationmeta_attach_meta_mode.meta_value', $testMode ? DonationMode::TEST : DonationMode::LIVE);
        }

        return [
            $query,
            $dependencies,
        ];
    }

}