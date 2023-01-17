<?php
include("fetch_ip.php");
// include("search.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>IP INFO</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
</head>

<body>
    <script>
        $(document).on("click", "#srch", function(e) {
            e.preventDefault();
            var ip = $("#ip").val();
            ip = JSON.stringify({
                'ip': ip
            });
            $.ajax({

                url: "search.php",
                type: "POST",
                data: ip,
                contentType: "application/json; charset=utf-8",
                success: function(data) {
                    $("#myiframe").html(`<iframe src="https://maps.google.com/maps?q=${data.lat},${data.lon}&hl=es;z=14&amp;output=embed" width="100%" height="625" frameborder="0"></iframe>`)
                    // var data = JSON.parse(data)
                    console.log(data);
                    $("#country").text(data.country);
                    $("#countrycode").text(data.countryCode);
                    $("#continent").text(data.continent);
                    $("#continentcode").text(data.continentCode);
                    $("#region").text(data.region);
                    $("#regionname").text(data.regioNname);
                    $("#currency").text(data.currency);
                    $("#isp").text(data.isp);
                    $("#as").text(data.as);
                    $("#city").text(data.city);
                    $("#district").text(data.district);
                    $("#lon").text(data.lon);
                    $("#lat").text(data.lat);
                    $("#timezone").text(data.timezone);
                }

            });
        })
    </script>
    <!-- Navigation-->
    <!-- Masthead-->
    <header class="masthead" style="height: 50px;">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6" style="margin-top: -150px;">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="">Your IP information is provided, want to search other IP info? Paste IP bellow</h1>
                        <!-- input form to search ip -->
                        <div class="row">
                            <div class="col">
                                <form action="#" method="post" id="ip-form">

                                    <div class="input-group">
                                        <input name="ip" id="ip" class="form-control" type="text" placeholder="Enter search IP" />
                                        <button id="srch" class="btn btn-primary" id="button-search" type="button">Submit</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">


                <div class="card border-primary">
                    <h5 class="card-header bg-primary d-flex justify-content-between">
                        <span class="text-light lead align-self-center">IP address: " <?= $ip->query ?></span>"</span>

                    </h5>

                    <div class="card-body" id="fill">

                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th colspan="12">IP address information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Country</td>
                                    <td>"<span id="country"><?= $ip->country ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Country code</td>
                                    <td>"<span id="countrycode"><?= $ip->countryCode ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Continent</td>
                                    <td>"<span id="continent"><?= $ip->continent ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Continent code</td>
                                    <td>"<span id="continentcode"><?= $ip->continentCode ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Region</td>
                                    <td>"<span id="region"><?= $ip->region ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Region name</td>
                                    <td>"<span id="regionname"><?= $ip->regionName ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Internet service provider</td>
                                    <td>"<span id="isp"><?= $ip->isp ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>As</td>
                                    <td>"<span id="as"><?= $ip->as ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Timezone</td>
                                    <td>"<span id="timezone"><?= $ip->timezone ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Currency</td>
                                    <td>"<span id="currency"><?= $ip->currency ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>"<span id="city"><?= $ip->city ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>district</td>
                                    <td>"<span id="district"><?= $ip->district ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>"<span id="lon"><?= $ip->lon ?></span>"</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>"<span id="lat"><?= $ip->lat ?></span>"</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-primary">
                    <h5 class="card-header bg-primary d-flex justify-content-between">
                        <span class="text-light lead align-self-center">Google map location</span>

                    </h5>

                    <div class="card-body" id="myIframe">
                        <iframe src="https://maps.google.com/maps?q=<?= $ip->lat ?>,<?= $ip->lon ?>&hl=es;z=14&amp;output=embed" width="100%" height="625" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2022. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>