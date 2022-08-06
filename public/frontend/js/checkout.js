$(document).ready(function () {
    $(".razorpay-btn").click(function (e) {
        e.preventDefault();
        var fname = $(".fname").val();
        var lname = $(".lname").val();
        var email = $(".email").val();
        var phoneno = $(".phoneno").val();
        var adress1 = $(".adress1").val();
        var adress2 = $(".adress2").val();
        var city = $(".city").val();
        var State = $(".State").val();
        var country = $(".country").val();
        var pincode = $(".pincode").val();

        if (!fname) {
            fname_error = "First name is required";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }
        if (!lname) {
            lname_error = "Last name is required";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }
        if (!email) {
            email_error = "email is required";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }
        if (!phoneno) {
            phoneno_error = "phone number is required";
            $("#phoneno_error").html("");
            $("#phoneno_error").html(phoneno_error);
        } else {
            phoneno_error = "";
            $("#phoneno_error").html("");
        }
        if (!adress1) {
            adress1_error = "adress1 is required";
            $("#adress1_error").html("");
            $("#adress1_error").html(adress1_error);
        } else {
            adress1_error = "";
            $("#adress1_error").html("");
        }
        if (!adress2) {
            adress2_error = "adress2 is required";
            $("#adress2_error").html("");
            $("#adress2_error").html(adress2_error);
        } else {
            adress2_error = "";
            $("#adress2_error").html("");
        }
        if (!city) {
            city_error = "city is required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }
        if (!State) {
            State_error = "State is required";
            $("#State_error").html("");
            $("#State_error").html(State_error);
        } else {
            State_error = "";
            $("#State_error").html("");
        }
        if (!country) {
            country_error = "country is required";
            $("#country_error").html("");
            $("#country_error").html(country_error);
        } else {
            country_error = "";
            $("#country_error").html("");
        }
        if (!pincode) {
            pincode_error = "pincode is required";
            $("#pincode_error").html("");
            $("#pincode_error").html(pincode_error);
        } else {
            pincode_error = "";
            $("#pincode_error").html("");
        }
        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phoneno_error != "" ||
            adress1_error != "" ||
            adress2_error != "" ||
            city_error != "" ||
            State_error != "" ||
            country_error != "" ||
            pincode_error != ""
        ) {
            return false;
        } else {
            var data = {
                fname: fname,
                lname: lname,
                email: email,
                phoneno: phoneno,
                adress1: adress1,
                adress2: adress2,
                city: city,
                State: State,
                country: country,
                pincode: pincode,
            };
            $.ajax({
                type: "POST",
                url: "/proced-to-pay",
                data: data,

                success: function (response) {
                    var options = {
                        key: "rzp_test_ULl6VNGVxGrmOF", // Enter the Key ID generated from the Dashboard
                        amount: "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        currency: "INR",
                        name: "ayoub elharem",

                        image: "C:UsersayoubDesktop\5498964.jpg",
                        // order_id: "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        handler: function (responsea) {
                            alert(response.razorpay_payment_id);
                            $.ajax({
                                type: "POST",
                                url: "/place-order",
                                data: {
                                    fname: responsea.fname,
                                    lname: responsea.lname,
                                    email: responsea.email,
                                    phone: responsea.phoneno,
                                    address1: responsea.address1,
                                    address2: responsea.address2,
                                    city: responsea.city,
                                    state: responsea.state,
                                    country: responsea.country,
                                    pincode: responsea.pincode,
                                    payement_mode: "payed by razorpay",
                                    payement_id: responsea.razorpay_payment_id,
                                },
                                success: function (responseb) {
                                    alert(responseb.status);
                                },
                            });
                        },
                        prefill: {
                            name: "AYOUB Elharem",
                            email: response.email,
                            contact: response.phoneno,
                        },

                        theme: {
                            color: "#3399cc",
                        },
                    };
                    var rzp1 = new Razorpay(options);

                    rzp1.open();
                },
            });
        }
    });
});
