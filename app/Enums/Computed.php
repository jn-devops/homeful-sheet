<?php

namespace App\Enums;

enum Computed: string
{
    case gmi_principal = 'gmi principal';
    case gmi_percent_principal = 'gmi percent - principal';
    case net_gmi_principal = 'net gmi principal';
    case gmi_factor_rate_principal = 'gmi factor rate - principal';
    case total_gmi_loanable = 'total gmi loanable';
    case maximum_loanable_amount_principal = 'maximum loanable amount - principal';
    case net_loanable_amount_principal = 'net loanable amount - principal';
    case net_loanable_amount_total = 'net loanable amount - total';
    case computation_label_1_principal = 'computation label 1 - principal';
    case computation_label_2_principal = 'computation label 2 - principal';
    case computation_label_3_principal = 'computation label 3 - principal';
    case computation_label_4_principal = 'computation label 4 - principal';
    case amort_princ_int1 = 'computation 1 - principal';
    case amort_mrisri1 = 'computation 2 - principal';
    case amort_nonlife1 = 'computation 3 - principal';
    case monthly_amort1 = 'computation 4 - principal';
    //Coborrower 
    case computation_label_1_coborrower_1 = 'computation label 1 - coborrower 1';
    case computation_label_2_coborrower_1 = 'computation label 2 - coborrower 1';
    case computation_label_3_coborrower_1 = 'computation label 3 - coborrower 1';
    case computation_label_4_coborrower_1 = 'computation label 4 - coborrower 1';
    case amort_princ_int2 = 'computation 1 - coborrower 1';
    case amort_mrisri2 = 'computation 2 - coborrower 1';
    case amort_nonlife2 = 'computation 3 - coborrower 1';
    case monthly_amort2 = 'computation 4 - coborrower 1';
    //Coborrower 2
    case computation_label_1_coborrower_2 = 'computation label 1 - coborrower 2';
    case computation_label_2_coborrower_2 = 'computation label 2 - coborrower 2';
    case computation_label_3_coborrower_2 = 'computation label 3 - coborrower 2';
    case computation_label_4_coborrower_2 = 'computation label 4 - coborrower 2';
    case amort_princ_int3 = 'computation 1 - coborrower 2';
    case amort_mrisri3 = 'computation 2 - coborrower 2';
    case amort_nonlife3 = 'computation 3 - coborrower 2';
    case monthly_amort3 = 'computation 4 - coborrower 2';

    case total_label_1_principal = 'total label 1 - principal';
    case total_label_2_principal = 'total label 2 - principal';
    case total_label_3_principal = 'total label 3 - principal';
    case total_label_4_principal = 'total label 4 - principal';
    case computation_1_total = 'computation 1 - total';
    case computation_2_total = 'computation 2 - total';
    case computation_3_total = 'computation 3 - total';
    case computation_4_total = 'computation 4 - total';
    case mri_sri = 'MRI/SRI';
    case doc_stamp = 'doc stamp';
    case mri_sri_total_1 = 'MRI/SRI Total 1';
    case non_life_insurance = 'non-life insurance';
    case factor = 'factor';
    case monthly_p_i_principal = 'monthly p & i - principal';
    case blank_f132_principal = 'blank F132 - principal';
    case mri_sri_principal = 'mri/sri - principal';
    case blank_f135_principal = 'blank F135 - principal';
    case aap_principal = 'aap - principal';
    case doc_stamp_principal = 'doc stamp - principal';
    case annual_premium_principal = 'annual premium - principal';
    case monthly_p_i_total = 'monthly p & i - total';
    case blank_f132_total = 'blank F132 - total';
    case mri_sri_total_2 = 'MRI/SRI - total 2';
    case blank_f162_principal = 'blank F162 - principal';
    case aap_total = 'ap - total';
    case doc_stamp_total = 'doc stamp - total';
    case annual_premium_total = 'annual premium - total';
    case building_value = 'building value';
    case fire_coverage = 'fire coverage';
    case zone = 'zone';
    case tariff = 'tariff';
    case aup_1 = 'aup 1';
    case doc_stamp_percent_fire_insurance = 'doc stamp percent - fire insurance';
    case doc_stamp_fire_insurance = 'doc stamp - fire insurance';
    case fire_service_tax_percent = 'fire service tax percent';
    case fire_service_tax = 'fire service tax';
    case value_added_tax_percent_fire_insurance = 'value-added tax percent - fire insurance';
    case value_added_tax_fire_insurance = 'value-added tax - fire insurance';
    case lgu_tax_percent_fire_insurance = 'LGU tax percent - fire insurance';
    case lgu_tax_fire_insurance = 'LGU tax - fire insurance';
    case aup_2 = 'aup 2';
    case aap_line_1 = 'aap line 1';
    case aap_line_2 = 'aap line 2';
    case total_fire_insurance = 'total - fire insurance';
    case selling_price = 'selling price';
    case price_ceiling = 'price ceiling';
    case appraised_value = 'appraised value';
    case desired_loan = 'desired loan';
    case gross_income = 'gross income';
    case max_loan = 'max loan';
    case recommended_loan_base = 'recommended loan base';
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
