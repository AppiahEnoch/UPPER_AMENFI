<?php
include "checkUser.php"
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

    <title>Upper Amenfi Rural Bank</title>

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
    <link href="adminpage.css" rel="stylesheet" />
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <!-- Fixed navbar -->
      <nav
        id="nav1"
        class="navbar navbar-expand-md navbar-brand fixed-top w-100 m-0"
      >
        <div class="container-fluid">
          <img id="logo" class="navbar-brand" src="image/logo.jpg" alt="" />
          <button
            id="hambergerButton"
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a href="index.php" id="logout" class="nav-link"> Log out</a>
              </li>
              <li class="nav-item">
                <a id="ll1" class="nav-link" href="#">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  New Data</a
                >
              </li>
              <li class="nav-item">
                <a id="ll2" class="nav-link" href="#">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                  Edit Data</a
                >
              </li>

              <li class="nav-item">
                <a id="ll3" class="nav-link" href="#">
                  <i class="fa fa-search" aria-hidden="true"></i>

                  Search</a
                >
              </li>

    
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

    <div class="container mt-5">
  <div class="row mt-5">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee has exceeded a give leave period
              <span class="badge badge-secondary text-muted">4</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee qualifies for leave
              <span class="badge badge-secondary text-muted">7</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee has applied for sick leave
              <span class="badge badge-secondary text-muted">2</span>
            </li>
          </ul>
        </div>
      </div>
      
      
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee is on leave
              <span class="badge badge-secondary text-muted">23</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee has failed to return from leave
              <span class="badge badge-secondary text-muted">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Employee is close to retirement
              <span class="badge badge-secondary text-muted">10</span>
            </li>
          </ul>
        </div>
      </div>
      
      
    </div>
  </div>
</div>


    <footer id="myFooter" class="py-3 fixed-bottom">
      <div class="container">
        <span class="text-muted">&COPY;2022 All rights reserved</span>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
