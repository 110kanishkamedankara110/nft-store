var showmenu = false;

function showMenu() {

    var menu = document.getElementById("menu");
    var menubut = document.getElementById("menu-but");

    if (showmenu) {

        menu.style = "width:0;height:0";
        menubut.style = "transform: rotate(0deg);";
        showmenu = false;
        document.getElementById("men").style.marginLeft = "100px";
        menu.style.padding = "0";


    } else {

        menu.style = "width:300px;height:fit-content";
        menubut.style = "transform: rotate(180deg);";
        showmenu = true;
        document.getElementById("men").style.marginLeft = "0";
        menu.style.padding = "10px";

    }
}
var c = 1;

function letters() {
    setInterval(letters2, 500);
}

function letters2() {
    var text = "Oops, Nothing Here Yet_";
    if (c <= text.length) {
        document.getElementById("oops").innerHTML = text.substring(0, c);

        if (c == text.length) {
            c = 1;
        } else {
            c = c + 1;
        }
    }






}

function cl() {
    document.getElementById("inp").click();
}

function show() {

    document.getElementById("images").innerHTML = "";
    var file = document.getElementById("inp");
    var length = file.files.length;
    var parent = document.getElementById("images");
    var bod = document.getElementById("bod");
    var br5 = document.createElement("br");

    var but = document.createElement("button");
    for (var i = 0; i < length; i++) {

        // var div = document.createElement("div");
        var card = document.createElement("div");
        var price = document.createElement("input");
        var des = document.createElement("textarea");
        var tit = document.createElement("input");


        var br = document.createElement("br");
        var br2 = document.createElement("br");
        var br3 = document.createElement("br");
        var br4 = document.createElement("br");

        var url = URL.createObjectURL(file.files[i]);

        var c = parent.appendChild(card);
        c.className = "c";

        // var child = c.appendChild(div);
        var pi = c.appendChild(price);
        c.appendChild(br);
        c.appendChild(br2);
        var te = c.appendChild(des);
        c.appendChild(br3);
        c.appendChild(br4);
        var title = c.appendChild(tit);


        pi.id = "price" + i;
        pi.type = "text";
        pi.placeholder = "Price";
        pi.className = "te"

        title.id = "title" + i;
        title.placeholder = "Nft title";
        title.className = "te";

        c.id = "image" + i;

        te.id = "des" + i;
        te.placeholder = "description";
        te.className = "te";

        // document.getElementById("image" + i).className = "img";
        document.getElementById("image" + i).style = "background-image:url(" + url + ");";



    }


    var btn = bod.appendChild(but);
    btn.id = "up";
    document.getElementById("up").setAttribute("onclick", "upload();");
    btn.innerHTML = "Upload";
    btn.className = "ub";



}

function upload() {
    var image = document.getElementById("inp");
    var length = image.files.length;
    var form = new FormData();
    for (var i = 0; i < length; i++) {
        form.append("img" + i, image.files[i]);
        form.append("price" + i, document.getElementById("price" + i).value);
        form.append("des" + i, document.getElementById("des" + i).value);
        form.append("tit" + i, document.getElementById("title" + i).value);
    }

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "imageUpload.php";
            loading('none');
        } else {
            loading('grid');
        }
    };
    r.open("POST", "upload.php", true);
    r.send(form);


}

function viewimage(id) {
    var f = new FormData();
    // alert(id);
    f.append("id", id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "viewimage.php";
            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "setimage.php", true);
    r.send(f);
}

function userimage(id) {
    var f = new FormData();
    // alert(id);
    f.append("id", id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "user_image_view.php";
            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "setimage.php", true);
    r.send(f);
}

function loading(x) {
    document.getElementById("loading").style.display = x;
}

function search() {
    var s = document.getElementById("search").value;
    var f = new FormData();
    f.append("search", s);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("main").innerHTML = text;
            loading('none');
        } else {
            loading('grid');
        }
    };
    r.open("POST", "search.php", true);
    r.send(f);

}

function sel(x) {
    var f = new FormData();
    f.append("ext", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("main").innerHTML = text;
            loading('none');
        } else {
            loading('grid');
        }
    };
    r.open("POST", "gif _or_img.php", true);
    r.send(f);
}

function request(x) {
    var f = new FormData();
    f.append("img", x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            loading('none');
        } else {
            loading('grid');
        }
    };
    r.open("POST", "email.php", true);
    r.send(f);
}

function showsignin() {

    document.getElementById("sd").style.order = "2";
    document.getElementById("ld").style.order = "1";
    document.getElementById("sdn").style.display = "block";
    document.getElementById("ldn").style.display = "none";
    document.getElementById("welcome-login").style.display = "none";
    document.getElementById("welcome-sign").style.display = "block";
    document.getElementById("sd").style.backgroundImage = "none";
    document.getElementById("ld").style.backgroundImage = "url('images/SigninIcon.jpg')";

}

function showlogin() {

    document.getElementById("sd").style.order = "1";
    document.getElementById("ld").style.order = "2";
    document.getElementById("sdn").style.display = "none";
    document.getElementById("ldn").style.display = "block";
    document.getElementById("welcome-login").style.display = "block";
    document.getElementById("welcome-sign").style.display = "none";
    document.getElementById("sd").style.backgroundImage = "url('images/loginIcon.jpg')";
    document.getElementById("ld").style.backgroundImage = "none";

}

function signin() {
    var email = document.getElementById("email");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var f = new FormData();
    f.append("email", email.value);
    f.append("password1", password1.value);
    f.append("password2", password2.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {
                document.getElementById("err").innerHTML = text;
            } else {
                document.getElementById("err").innerHTML = "";
                email.value = "";
                password1.value = "";
                password2.value = "";
                showlogin();

            }
            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "signinprocess.php", true);
    r.send(f);
}

function login() {
    var email = document.getElementById("loemail");
    var password1 = document.getElementById("lopassword");


    var f = new FormData();
    f.append("email", email.value);
    f.append("password1", password1.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {
                document.getElementById("err2").innerHTML = text;
            } else {
                document.getElementById("err2").innerHTML = "";
                email.value = "";
                password1.value = "";
                window.location = "index.php";


            }
            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "loginprocess.php", true);
    r.send(f);
}

function logout() {



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            window.location = "index.php";
            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "logout.php", true);
    r.send();
}

// function tim() {
//     setInterval(refresh, 4000);
// }

// function refresh() {

//     var s = document.getElementById("search").value;
//     var f = new FormData();
//     f.append("search", s);
//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             document.getElementById("main").innerHTML = text;

//         } else {

//         }
//     };
//     r.open("POST", "refresh.php", true);
//     r.send(f);

// }
function buy(x) {


    var f = new FormData();
    f.append("image_id", x);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            if (text != "error") {
                var js = JSON.parse(text);

                payhere.onCompleted = function onCompleted(orderId) {
                    // console.log("Payment completed. OrderID:" + orderId);
                    sell(js["id"], orderId);
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    // console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    // console.log("Error:" + error);
                };


                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217864", // Replace your Merchant ID
                    "return_url": undefined, // Important
                    "cancel_url": undefined, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": js['unique'],
                    "items": js['title'],
                    "amount": js['price'],
                    "currency": "LKR",
                    "first_name": "",
                    "last_name": "",
                    "email": js['email'],
                    "phone": "",
                    "address": "",
                    "city": "",
                    "country": "",
                    "delivery_address": "",
                    "delivery_city": "",
                    "delivery_country": "",
                    "custom_1": "",
                    "custom_2": ""
                };

                payhere.startPayment(payment);

            } else {
                alert("This Nft Is Alredy Sold");
            }

        }

    };
    r.open("POST", "payment.php", true);
    r.send(f);










}

function sell(x, y) {
    var f = new FormData();
    f.append("id", x);
    f.append("invoice", y);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            // window.location = "index.php";
            var text = r.responseText;
            request(x);
            window.location = "index.php";


            loading('none');
        } else {
            loading('grid');
        }

    };
    r.open("POST", "paysucess.php", true);
    r.send(f);



}

function statChange(x, stat) {
    var s = stat;
    var id = x;
    var f = new FormData();
    f.append("id", id);
    f.append("status", s);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            loading('none');
            window.location = "adminPannel.php";
        } else {
            loading('grid');
        }
    };
    r.open("POST", "ststchange.php", true);
    r.send(f);
}

function details(x) {
    var f = new FormData();
    // alert(id);
    f.append("id", x);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "details.php";
            loading('none')
        } else {
            loading('grid');
        }

    };
    r.open("POST", "setdetails.php", true);
    r.send(f);

}


var carImg = 0;
var int;

function carSet() {
    caro();
    int = setInterval(caro, 4000);



}

function caro() {



    var f = new FormData();
    var id = carImg;

    f.append("offset", carImg);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var test = r.responseText;

            document.getElementById("imm").style.backgroundImage = "url(" + test; + ")";

            for (var j = 0; j < 5; j++) {
                if (j == (carImg)) {
                    document.getElementById("c" + j).style = "background-color:teal;";

                } else {
                    document.getElementById("c" + j).style = "background-color:white;";

                }
            }

            carImg += 1;
            if (carImg == 5) {
                carImg = 0;
            }

        }
    };
    r.open("POST", "car.php", true);
    r.send(f);







}

function change(x) {
    carImg = x;

    caro();


}

// function down(x) {
//     // alert(x);
//     window.location = x;
//     window.scroll



// }