function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signupBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signupBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "success") {
                // document.getElementById("msg1").innerHTML = "Registration Success!";
                // document.getElementById("msg1").className = "alert alert-success";
                // document.getElementById("msgDiv1").className = "d-block";

                Swal.fire({
                    title: "Successfully Registered!",
                    text: response,
                    icon: "success"
                  });

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";




            } else {
                // document.getElementById("msg1").innerHTML = response;
                // document.getElementById("msgDiv1").className = "d-block";

                Swal.fire({
                    title:"" ,
                    text:response,
                    icon: "error"
                  });
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);
}


function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "success") {

                window.location = "index.php";
            } else {

                // document.getElementById("msg2").innerHTML = response;
                // document.getElementById("msgDiv2").className = "d-block";

                Swal.fire({
                    title:"" ,
                    text:response,
                    icon: "error"
                  });
            }

        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);


}



function adminSignIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                window.location = "adminDashboard.php";
            } else {

                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }

        }
    }

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);

}



function loaduser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb").innerHTML = response;

        }
    }

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}


function updateUserStatus() {

    var userId = document.getElementById("uId");

    var f = new FormData();
    f.append("uId", userId.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Deactive") {
                // document.getElementById("msg4").innerHTML = "User deactivated successfully";
                // document.getElementById("msg4").className = "alert alert-success";
                // document.getElementById("msgDiv4").className = "d-block";

                Swal.fire({
                    title: "Success",
                    text: "User Deactivated Successfully",
                    icon: "success"
                });

                userId.value = "";

                loaduser();

            } else if (response == "Active") {
                // document.getElementById("msg4").innerHTML = "User Activated successfully";
                // document.getElementById("msg4").className = "alert alert-success";
                // document.getElementById("msgDiv4").className = "d-block";

                Swal.fire({
                    title: "Success",
                    text: "User Activated Successfully",
                    icon: "success"
                });

                userId.value = "";

                loaduser();

            } else {
                // document.getElementById("msg4").innerHTML = response;
                // document.getElementById("msgDiv4").className = "d-block";

                Swal.fire(response);
            }
        }
    }

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);
}


function reload() {
    location.reload();
}




function brandReg() {
    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registered successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                brand.value = "";

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    }

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);
}



function catReg() {

    var category = document.getElementById("category");

    var f = new FormData();
    f.append("c", category.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registered successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";

                category.value = "";

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);

}



function colorReg() {

    var color = document.getElementById("color");

    var f = new FormData();
    f.append("co", color.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Registered successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";

                category.value = "";

            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    }

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);


}



function sizeReg() {

    var size = document.getElementById("size");

    var f = new FormData();
    f.append("s", size.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Registered successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";

                category.value = "";

            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    }

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);

}



function openNewWindow() {

    window.open('adminReportStock.php', '_blank', 'width=800,height=600');
}

function openNewWindow1() {

    window.open('adminReportProduct.php', '_blank', 'width=800,height=600');
}

function openNewWindow2() {

    window.open('adminReportUser.php', '_blank', 'width=800,height=600');
}



function regProduct() {

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var f = new FormData();
    f.append("pname", pname.value);
    f.append("brand", brand.value);
    f.append("cat", cat.value);
    f.append("color", color.value);
    f.append("size", size.value);
    f.append("desc", desc.value);
    f.append("image", file.files[0]);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                // alert("Product Registration Success!");

                Swal.fire({
                    title: "Success",
                    text: "Product Registration Success!",
                    icon: "success"
                });
                //   location.reload();
                setTimeout(function () {
                    location.reload();
                }, 2000);

            } else {
                // alert(response);
                Swal.fire(response);
            }

        }
    };

    request.open("POST", "productRegisterProcess.php", true);
    request.send(f);
}



function updateStock() {
    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("quantity");
    var price = document.getElementById("uprice");


    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {

        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            Swal.fire(response);
            // location.reload();
            setTimeout(function () {
                location.reload();
            }, 3000);
        }
    };

    request.open("POST", "updateStockProcess.php", true);
    request.send(f);
}




function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}



function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

        }
    }
    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}



function viewFilter() {
    var view = document.getElementById("filterId");
    view.classList.toggle("d-none");
}





function advSearchProduct(x) {
    // alert("ok");
    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

            color.value = "0";
            cat.value = "0";
            brand.value = "0";
            size.value = "0";
            min.value = "";
            max.value = "";
        }
    };

    r.open("POST", "advSearchProductProcess.php", true);
    r.send(f);
}
// advance search 




function uploadImg() {
    var img = document.getElementById("imgUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "empty") {
                // alert("please select your Profile image")
                Swal.fire("Please Select Your Profile Image");

            } else if (response !== "success") {
                reload();

            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }

        }
    }

    request.open("POST", "profileImgUploadProcess.php", true);
    request.send(f);

}

function updateData() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            Swal.fire(response);
        }
    }
    request.open("POST", "updateDataProcess.php", true);
    request.send(f);

}




function signOut() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            Swal.fire({
                title: "Successfully Signed out",
                text: response,
                icon: "success"
            });

            qty.value = "";

            reload();

        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();
}




function adminSignOut() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            Swal.fire({
                title: "Successfully Signed out",
                text: response,
                icon: "success"
            });

            // reload();

            setTimeout(function () {
                window.location = "adminsignin.php";
            }, 3000);

            // window.location ="adminsignin.php";

        }
    };

    request.open("POST", "adminSignOutProcess.php", true);
    request.send();
}






function addtoCart(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);

                Swal.fire({
                    title: "Good choice!",
                    text: response,
                    icon: "success"
                });

                qty.value = "";
            }
        }

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);


    } else {
        alert("Please Enter Valid Quantity");
    }
}




function loadCart() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("cartBody").innerHTML = response;

        }
    }

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}



function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //   alert(qty.value);

    var newQty = parseInt(qty.value) + 1;
    // alert (newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }

        }
    }

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);

}






function decrementCartQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //   alert(qty.value);

    var newQty = parseInt(qty.value) - 1;
    // alert (newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }

            }
        }


        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);

    }
}




function removeCart(x) {

    if (confirm("Are you sure u wanna delete?")) {

        var f = new FormData();
        f.append("c", x);


        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);

                reload();
            }
        }



        request.open("POST", "removeCartProcess.php", true);
        request.send(f);
    }

}



function checkOut() {
    // alert("ok");
    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");

        }
    }


    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}




function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);

                var order = JSON.parse(response);

                if (order.resp == "Success") {
                    // reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                }

            }
        };

        request.open("POST", path, true);
        request.send(f);

    };
    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };



    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);


}





function buyNow(stockId) {
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if ((request.readyState == 4) & (request.status == 200)) {
                var response = request.responseText;
                // alert(response);
                var payment = JSON.parse(response);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        };
        request.open("POST", "paymentProcess.php", true);
        request.send(f);
    } else {
        alert("Please enter a valid quantity");
    }
}



function forgotPassword() {
    var email = document.getElementById("e");

    if (email.value != "") {
        // alert("ok");

        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);

                if (response == "success") {
                    document.getElementById("msg").innerHTML = "email Sent! Please check your inbox";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                    email.value = "";
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }

            }
        };
        request.open("POST", "forgotPasswordProcess.php", true);
        request.send(f);


    } else {
        alert("Please enter your email");
    }
}



function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                window.location = "signin.php";

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };
    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);

}




function loadChart() {
    var ctx = document.getElementById('myChart');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            var data = JSON.parse(response);


            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        }
    };
    request.open("POST", "loadChartProcess.php", true);
    request.send();
}