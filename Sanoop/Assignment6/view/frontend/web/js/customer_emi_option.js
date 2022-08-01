define([
    'jquery',
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function ($, Component, customerData) {
    'use strict';

    return Component.extend({
        /** @inheritdoc */
        initialize: function () {
            this._super();
            let emi_plans = customerData.get('customernames');
            let prize = Number(this.price);
            let currency = this.currency;
            console.log(currency);
            console.log(emi_plans().msg);
            let html = [];
            let startEmi;
            $.each(emi_plans().msg, function (index, value) {
                console.log(value);
                let Tenure = value.tenure;
                let InterestRate = value.interest_rate;
                let Interst_amount = prize * (InterestRate / 100);
                let Intersted_amount = prize + Interst_amount;
                let PlanAmount = Intersted_amount / Tenure;
                if (index == 0) {
                    startEmi = currency + PlanAmount.toFixed(2);
                }
                html[index] = '<td>' + currency + PlanAmount.toFixed(2) + 'x' + Tenure + 'm</td><td>' + currency + Interst_amount.toFixed(2) + '(' + InterestRate + '%)</td><td>' + currency + Intersted_amount.toFixed(2) + '</td>';
            });
            console.log(html);
            this.startEmi = startEmi;
            this.customeremi = html;
        }
    });
});

