<?php

namespace App\Enums;

enum Computed: string
{
    case gmi_principal = 'GMI_PRINCIPAL';
    case gmi_percent_principal = 'GMI_PERCENT_PRINCIPAL';
    case net_gmi_principal = 'NET_GMI_PRINCIPAL';
    case gmi_factor_rate_principal = 'GMI_FACTOR_RATE_PRINCIPAL';
    case total_gmi_loanable = 'TOTAL_GMI_LOANABLE';
    case maximum_loanable_amount_principal = 'MAXIMUM_LOANABLE_AMOUNT_PRINCIPAL';
    case net_loanable_amount_principal = 'NET_LOANABLE_AMOUNT_PRINCIPAL';
    case net_loanable_amount_total = 'NET_LOANABLE_AMOUNT_TOTAL';
    case computation_label_1_principal = 'COMPUTATION_LABEL_1_PRINCIPAL';
    case computation_label_2_principal = 'COMPUTATION_LABEL_2_PRINCIPAL';
    case computation_label_3_principal = 'COMPUTATION_LABEL_3_PRINCIPAL';
    case computation_label_4_principal = 'COMPUTATION_LABEL_4_PRINCIPAL';
    case amort_princ_int1 = 'COMPUTATION_1_PRINCIPAL';
    case amort_mrisri1 = 'COMPUTATION_2_PRINCIPAL';
    case amort_nonlife1 = 'COMPUTATION_3_PRINCIPAL';
    case monthly_amort1 = 'COMPUTATION_4_PRINCIPAL';
    //Coborrower
    case computation_label_1_coborrower_1 = 'COMPUTATION_LABEL_1_COBORROWER_1';
    case computation_label_2_coborrower_1 = 'cCOMPUTATION_LABEL_2_COBORROWER_1';
    case computation_label_3_coborrower_1 = 'COMPUTATION_LABEL_3_COBORROWER_1';
    case computation_label_4_coborrower_1 = 'COMPUTATION_LABEL_4_COBORROWER_1';
    case amort_princ_int2 = 'COMPUTATION_1_COBORROWER_1';
    case amort_mrisri2 = 'COMPUTATION_2_COBORROWER_1';
    case amort_nonlife2 = 'COMPUTATION_3_COBORROWER_1';
    case monthly_amort2 = 'COMPUTATION_4_COBORROWER_1';
    //Coborrower 2
    case computation_label_1_coborrower_2 = 'COMPUTATION_LABEL_1_COBORROWER_2';
    case computation_label_2_coborrower_2 = 'COMPUTATION_LABEL_2_COBORROWER_2';
    case computation_label_3_coborrower_2 = 'COMPUTATION_LABEL_3_COBORROWER_2';
    case computation_label_4_coborrower_2 = 'COMPUTATION_LABEL_4_COBORROWER_2';
    case amort_princ_int3 = 'COMPUTATION_1_COBORROWER_2';
    case amort_mrisri3 = 'COMPUTATION_2_COBORROWER_2';
    case amort_nonlife3 = 'COMPUTATION_3_COBORROWER_2';
    case monthly_amort3 = 'COMPUTATION_4_COBORROWER_2';
    case total_label_1_principal = 'TOTAL_LABEL_1_PRINCIPAL';
    case total_label_2_principal = 'TOTAL_LABEL_2_PRINCIPAL';
    case total_label_3_principal = 'TOTAL_LABEL_3_PRINCIPAL';
    case total_label_4_principal = 'TOTAL_LABEL_4_PRINCIPAL';
    case computation_1_total = 'COMPUTATION_1_TOTAL';
    case computation_2_total = 'COMPUTATION_2_TOTAL';
    case computation_3_total = 'COMPUTATION_3_TOTAL';
    case computation_4_total = 'COMPUTATION_4_TOTAL';
    case mri_sri = 'MRI_SRI';
    case doc_stamp = 'DOC_STAMP';
    case mri_sri_total_1 = 'MRI_SRI_TOTAL_1';
    case non_life_insurance = 'NON_LIFE_INSURANCE';
    case factor = 'FACTOR';
    case monthly_p_i_principal = 'MONTHLY_P_I_PRINCIPAL';
    case blank_f132_principal = 'BLANK_F132_PRINCIPAL';
    case mri_sri_principal = 'MRI_SRI_PRINCIPAL';
    case blank_f135_principal = 'BLANK_F135_PRINCIPAL';
    case aap_principal = 'AAP_PRINCIPAL';
    case doc_stamp_principal = 'DOC_STAMP_PRINCIPAL';
    case annual_premium_principal = 'ANNUAL_PREMIUM_PRINCIPAL';
    case monthly_p_i_total = 'MONTHLY__P_I_TOTAL';
    case blank_f132_total = 'BLANK_F132_TOTAL';
    case mri_sri_total_2 = 'MRI_SRI_TOTAL_2';
    case blank_f162_principal = 'BLANK_F162_PRINCIPAL';
    case aap_total = 'AP_TOTAL';
    case doc_stamp_total = 'DOC_STAMP_TOTAL';
    case annual_premium_total = 'ANNUAL_PREMIUM_TOTAL';
    case building_value = 'BUILDING_VALUE';
    case fire_coverage = 'FIRE_COVERAGE';
    case zone = 'ZONE';
    case tariff = 'TARIFF';
    case aup_1 = 'AUP_1';
    case doc_stamp_percent_fire_insurance = 'DOC_STAMP_PERCENT_FIRE_INSURANCE';
    case doc_stamp_fire_insurance = 'DOC_STAMP_FIRE_INSURANCE';
    case fire_service_tax_percent = 'FIRE_SERVICE_TAX_PERCENT';
    case fire_service_tax = 'FIRE_SERVICE_TAX';
    case value_added_tax_percent_fire_insurance = 'VALUE_ADDED_TAX_PERCENT_FIRE_INSURANCE';
    case value_added_tax_fire_insurance = 'VALUE_ADDED_TAX_FIRE_INSURANCE';
    case lgu_tax_percent_fire_insurance = 'LGU_TAX_PERCENT_FIRE_INSURANCE';
    case lgu_tax_fire_insurance = 'LGU_TAX_FIRE_INSURANCE';
    case aup_2 = 'aAUP_2';
    case aap_line_1 = 'AAP_LINE_1';
    case aap_line_2 = 'AAP_LINE_2';
    case total_fire_insurance = 'TOTAL_FIRE_INSURANCE';
    case selling_price = 'SELLING_PRICE';
    case price_ceiling = 'PRICE_CEILING';
    case appraised_value = 'APPRAISED_VALUE';
    case desired_loan = 'DESIRED_LOAN';
    case gross_income = 'GROSS_INCOME';
    case max_loan = 'MAX_LOAN';
    case recommended_loan_base = 'RECOMMENDED_LOAN_BASE';
    public function cell()
    {
        return match ($this) {
            Computed::gmi_principal => env('gmi_principal', 'F37'),
            Computed::gmi_percent_principal => env('gmi_percent_principal', 'G37'),
            Computed::net_gmi_principal => env('net gmi principal', 'F38'),
            Computed::gmi_factor_rate_principal => env('gmi_factor_rate_principal', 'F39'),
            Computed::total_gmi_loanable => env('total_gmi_loanable','G53'),
            Computed::maximum_loanable_amount_principal => env('maximum_loanable_amount_principal', 'F79'),
            Computed::net_loanable_amount_principal => env('net_loanable_amount_principal', 'I79'),
            Computed::net_loanable_amount_total => env('net_loanable_amount_total', 'I82'),
            Computed::computation_label_1_principal => env('computation _label_1_principal', 'B100'),
            Computed::computation_label_2_principal => env('computation _abel_2_principal', 'B101'),
            Computed::computation_label_3_principal => env('computation _label_3_principal', 'B102'),
            Computed::computation_label_4_principal => env('computation _label_4_principal', 'B103'),
            Computed::amort_princ_int1 => env('computation 1 - principal', 'G100'),
            Computed::amort_mrisri1 => env('computation 2 - principal', 'G101'),
            Computed::amort_nonlife1 => env('computation 3 - principal', 'G102'),
            Computed::monthly_amort1 => env('computation 4 - principal', 'G103'),
            //coborrower 1
            Computed::computation_label_1_coborrower_1 => env('computation _label_1_principal', 'B105'),
            Computed::computation_label_2_coborrower_1 => env('computation _abel_2_principal', 'B106'),
            Computed::computation_label_3_coborrower_1 => env('computation _label_3_principal', 'B107'),
            Computed::computation_label_4_coborrower_1 => env('computation _label_4_principal', 'B108'),
            Computed::amort_princ_int2 => env('computation 1 - coborrower 1', 'G105'),
            Computed::amort_mrisri2 => env('computation 2 - coborrower 1', 'G106'),
            Computed::amort_nonlife2 => env('computation 3 - coborrower 1', 'G107'),
            Computed::monthly_amort2 => env('computation 4 - coborrower 1', 'G108'),
            //coborrower 2
            Computed::computation_label_1_coborrower_2 => env('computation _label_1_principal', 'B110'),
            Computed::computation_label_2_coborrower_2 => env('computation _abel_2_principal', 'B111'),
            Computed::computation_label_3_coborrower_2 => env('computation _label_3_principal', 'B112'),
            Computed::computation_label_4_coborrower_2 => env('computation _label_4_principal', 'B113'),
            Computed::amort_princ_int3 => env('computation 1 - principal', 'G110'),
            Computed::amort_mrisri3 => env('computation 2 - principal', 'G111'),
            Computed::amort_nonlife3 => env('computation 3 - principal', 'G112'),
            Computed::monthly_amort3 => env('computation 4 - principal', 'G113'),

            Computed::total_label_1_principal => env('total label 1 - principal', 'B115'),
            Computed::total_label_2_principal => env('total label 2 - principal', 'B116'),
            Computed::total_label_3_principal => env('total label 3 - principal', 'B117'),
            Computed::total_label_4_principal => env('total label 4 - principal', 'B118'),

            Computed::computation_1_total => env('computation 1 - total', 'G115'),
            Computed::computation_2_total => env('computation 2 - total', 'G116'),
            Computed::computation_3_total => env('computation 3 - total', 'G117'),
            Computed::computation_4_total => env('computation 4 - total', 'G118'),

            Computed::mri_sri => env('MRI/SRI', 'F121'),
            Computed::doc_stamp => env('doc stamp', 'F122'),
            Computed::mri_sri_total_1 => env('MRI/SRI Total 1', 'F123'),
            Computed::non_life_insurance => env('non-life insurance', 'F124'),
            Computed::factor => env('factor', 'F128'),
            Computed::monthly_p_i_principal => env('monthly p & i - principal', 'F131'),
            Computed::blank_f132_principal => env('blank F132 - principal', 'F132'),
            Computed::mri_sri_principal => env('mri/sri - principal', 'F134'),
            Computed::blank_f135_principal => env('blank F135 - principal', 'F135'),
            Computed::aap_principal => env('aap - principal', 'F136'),
            Computed::doc_stamp_principal => env('doc stamp - principal', 'F137'),
            Computed::annual_premium_principal => env('annual premium - principal', 'F138'),
            Computed::monthly_p_i_total => env('monthly p & i - total', 'F158'),
            Computed::blank_f132_total => env('blank F132 - total', 'F159'),
            Computed::mri_sri_total_2 => env('MRI/SRI - total 2', 'F161'),
            Computed::blank_f162_principal => env('blank F162 - principal', 'F162'),
            Computed::aap_total => env('aap - total', 'F163'),
            Computed::doc_stamp_total => env('doc stamp - total', 'F164'),
            Computed::annual_premium_total => env('annual premium - total', 'F165'),
            Computed::building_value => env('building value', 'F168'),
            Computed::fire_coverage => env('fire coverage', 'F169'),
            Computed::zone => env('zone', 'F170'),
            Computed::tariff => env('tariff', 'F171'),
            Computed::aup_1 => env('aup 1', 'F172'),
            Computed::doc_stamp_percent_fire_insurance => env('doc stamp percent - fire insurance', 'F173'),
            Computed::doc_stamp_fire_insurance => env('doc stamp - fire insurance', 'F174'),
            Computed::fire_service_tax_percent => env('fire service tax percent', 'F175'),
            Computed::fire_service_tax => env('fire service tax', 'F176'),
            Computed::value_added_tax_percent_fire_insurance => env('value-added tax percent - fire insurance', 'F177'),
            Computed::value_added_tax_fire_insurance => env('value-added tax - fire insurance', 'F178'),
            Computed::lgu_tax_percent_fire_insurance => env('LGU tax percent - fire insurance', 'F179'),
            Computed::lgu_tax_fire_insurance => env('LGU tax - fire insurance', 'F180'),
            Computed::aup_2 => env('aup 2', 'F181'),
            Computed::aap_line_1 => env('aap line 1', 'F182'),
            Computed::aap_line_2 => env('aap line 2', 'F183'),
            Computed::total_fire_insurance => env('total - fire insurance', 'F184'),
            Computed::selling_price => env('SELLING_PRICE', 'I21'),
            Computed::price_ceiling => env('PRICE_CEILING', 'I22'),
            Computed::appraised_value => env('APPRAISED_VALUE', 'I27'),
            Computed::desired_loan => env('DESIRED_LOAN', 'I31'),
            Computed::gross_income => env('GROSS_INCOME', 'I51'),
            Computed::max_loan => env('MAX_LOAN', 'I75'),
            Computed::recommended_loan_base => env('RECOMMENDED_LOAN_BASE', 'K86'),
        };
    }
}
