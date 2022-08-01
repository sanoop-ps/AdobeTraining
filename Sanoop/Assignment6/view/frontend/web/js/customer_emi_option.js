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
                let Interst_amount = Math.round(prize * (value.interest_rate / 100));
                let Intersted_amount = Math.round(prize + Interst_amount);
                let PlanAmount = Math.round(prize + Interst_amount);
                let Tenure = value.tenure;
                let InterestRate = value.interest_rate;
                if (index == 0) {
                    startEmi = currency + PlanAmount;
                }
                html[index] = '<td>' + currency + PlanAmount + 'x' + Tenure + 'm</td><td>' + currency + Interst_amount + '(' + InterestRate + '%)</td><td>' + currency + Intersted_amount + '</td>';
            });
            console.log(html);
            this.startEmi = startEmi;
            this.customeremi = html;
        }
    });
});

