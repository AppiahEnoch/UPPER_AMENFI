<?php
 session_start();
 session_destroy();
 session_start();


 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="AECleanCodes" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
      integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <title>Sign In</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
          inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="index1.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <script>
      var username = "";
      var password = "";

      $(document).ready(function () {





        hideSpin();
        $("#show_password").click(function () {
          var passwordInput = $("#tf_password");
          var passwordType = passwordInput.attr("type");
          var toggleIcon = $(this).find(".fa");

          if (passwordType === "password") {
            passwordInput.attr("type", "text");
            toggleIcon.removeClass("fa-eye-slash").addClass("fa-eye");
          } else {
            passwordInput.attr("type", "password");
            toggleIcon.removeClass("fa-eye").addClass("fa-eye-slash");
          }
        });

        $("#form").submit(function (e) {
          e.preventDefault();
          getInput();

          if (aeEmpty(username)) {
            showErrorText("Enter username");
            return;
          }
          if (aeEmpty(password)) {
            showErrorText("Enter password");
            return;
          }
          hideErrorText();
          showSpin();

          $("#tf_username").keyup(function () {
            hideErrorText();
          });
          $("#tf_password").keyup(function () {
            hideErrorText();
          });

          checkLogin();
        });
      });
    </script>

    <main class="form-signin w-100 m-auto">
      <form id="form">
        <img
          id="logo"
          class="mb-4"
          src="image/logo.jpg"
          alt=""
          width="72"
          height="57"
        />

        <div class="col w-100 m-2 bg-light p-2">
          <h1 id="please_signin" class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating mb-1">
            <input
              type="text"
              class="form-control"
              id="tf_username"
              placeholder="username"
              required
            />
            <label for="tf_username">Username</label>
          </div>

          <div class="form-floating mb-0">
            <input
              type="password"
              class="form-control"
              id="tf_password"
              placeholder="Password"
              required
            />
            <label for="tf_assword">Password</label>
            <a id="show_password">
              <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </a>
          </div>

          <label id="error_message"> Invalid login attempt </label>

          <button id="submit" class="w-100 btn btn-lg" type="submit">
            Login
            <i id="spin" class="fas fa-spinner fa-pulse"></i>
          </button>
          <div id="signup" class="row">
            <a id="forgot_password" href="recoverPassword.html">
              Forgot password</a
            >
            <span id="span_signup">
              New User? &nbsp;
              <a id="a_signup" href="signup1.html"> Sign up</a></span
            >
          </div>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
      </form>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <script>
      function myAjax1() {
        $.ajax({
          type: "post",
          data: {
            id: id,
          },
          cache: false,
          url: "",
          dataType: "text",
          success: function (data, status) {
            //alert(data);
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }
      function checkLogin() {
        $.ajax({
          type: "post",
          data: {
            username: username,
            password: password,
          },
          cache: false,
          url: "validateLogin.php",
          dataType: "text",
          success: function (data, status) {
            if (data == 900) {
              openPage("adminpage.php");
              return;
            }
            if (data == 1) {
              openPage("userPage.php");
              return;
            }

            showErrorText("Invalid Login Attempt");
            hideSpin();
          },
          error: function (xhr, status, error) {
            alert(error);
          },
        });
      }

      function getInput() {
        username = $("#tf_username").val();
        password = $("#tf_password").val();
      }

      function validate_mobile_g(mobile) {
        var phoneRe = /^[0-9]{10}$/;
        var digits = mobile.replace(/\D/g, "");
        return phoneRe.test(digits);
      }

      const validateEmail = (email) => {
        return String(email)
          .toLowerCase()
          .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
      };

      function aeEmpty(e) {
        var ee = "";
        try {
          ee = e.trim();
        } catch (error) {
          return true;
        }
        try {
          switch (e) {
            case "":
            case 0:
            case "0":
            case null:
            case false:
            case undefined:
              return true;
            default:
              return false;
          }
        } catch (error) {
          return true;
        }
      }

      function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

      function showErrorText(message) {
        if (aeEmpty(message)) {
          $("#error_message").text("Error");
          $("#error_message").show();
          return;
        }
        $("#error_message").text(message);
        $("#error_message").show();
      }

      function hideErrorText() {
        $("#error_message").text("");
        $("#error_message").hide();
        hideSpin();
      }

      function showSpin() {
        $("#spin").show();
      }
      function hideSpin() {
        $("#spin").hide();
      }

      function openPage_blank(url) {
        window.open(url, "_blank");
      }
      function openPage(url) {
         location.href = url;
      }
    </script>
  </body>
</html>
