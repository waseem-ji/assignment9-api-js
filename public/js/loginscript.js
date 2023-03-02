// function login() {
//     let email = document.getElementById("email_address");
//     let password = document.getElementById("password");
//     console.log("asdkjan");
//     console.log(email.value, password.value);
//     loginData = $.ajax({
//         method: "POST",
//         dataType: "json",
//         url: "http://todo.test/api/login",
//         async: false,
//         data: {
//             email: email.value,
//             password: password.value,
//         },
//         success: function (response) {
//             if (response.success) {
//                 // console.log("asjkdas");
//                 // console.log(response);
//                 //console.log(location.href="todos");
//                 location.href = "todos";
//             } else {
//                 console.log("failed");
//             }
//             return response;
//             // Redirect after succesfull login
//         },
//     }).responseText;

//     console.log(loginData);
//     data = JSON.parse(loginData);
//     sessionStorage.setItem("token", data["data"]["token"]);
//     console.log(data["data"]["token"]);
// }

// // create function for register

// // Logout function - clear session values
