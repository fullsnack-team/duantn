"use strict";
var KTModalOfferADealDetails = function () {
    var e, t, a, i, o;
    return {
        init: function () {
            i = KTModalOfferADeal.getForm(), o = KTModalOfferADeal.getStepperObj(), e = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-next"]'), t = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="details-previous"]'), $(i.querySelector('[name="details_activation_date"]')).flatpickr({
                enableTime: !0,
                dateFormat: "d, M Y, H:i"
            }), $(i.querySelector('[name="details_customer"]')).on("change", (function () {
                a.revalidateField("details_customer")
            })), a = FormValidation.formValidation(i, {
                fields: {
                    details_customer: {validators: {notEmpty: {message: "Customer is required"}}},
                    details_title: {validators: {notEmpty: {message: "Deal title is required"}}},
                    details_activation_date: {validators: {notEmpty: {message: "Activation date is required"}}},
                    "details_notifications[]": {validators: {notEmpty: {message: "Notifications are required"}}}
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), e.addEventListener("click", (function (t) {
                t.preventDefault(), e.disabled = !0, a && a.validate().then((function (t) {
                    console.log("validated!"), "Valid" == t ? (e.setAttribute("data-kt-indicator", "on"), setTimeout((function () {
                        e.removeAttribute("data-kt-indicator"), e.disabled = !1, o.goNext()
                    }), 1500)) : (e.disabled = !1, Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {confirmButton: "btn btn-primary"}
                    }))
                }))
            })), t.addEventListener("click", (function () {
                o.goPrevious()
            }))
        }
    }
}();
"undefined" != typeof module && void 0 !== module.exports && (window.KTModalOfferADealDetails = module.exports = KTModalOfferADealDetails);
