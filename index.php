<?php

include 'config.php';



$service = $_GET['service'];

global $app_contact_no;

//Include header

include 'layouts/header.php';

$date = date('m-d-Y');

$date1 = str_replace('-', '/', $date);


?>

<!-- Landing Section Start -->
<section class="landing-sectio">
    <!-- <div class="container">
        <div class="home-landing-slider">
            <div class="home-landing-slide">
                <div class="landing-contact">
                    <div class="row">
                        <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="landing-title-content">
                                <h2 class="landing-title">Find Your Best
                                    <img src="images/landing_hart.png" alt="Hart" class="img-fluid"> <br>
                                    <span>Holiday</span> Package
                                </h2>
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="landing-img">
                                <img src="images/landing_img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-landing-slide">
                <div class="landing-contact">
                    <div class="row">
                        <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="landing-title-content">
                                <h2 class="landing-title">Find Your Best
                                    <img src="images/landing_hart.png" alt="Hart" class="img-fluid"> <br>
                                    <span>Holiday</span> Package
                                </h2>
                            </div>
                        </div>
                        <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="landing-img">
                                <img src="images/landing_img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-flying-img">
        <img src="images/perasuit.png" alt="Flying_img" class="img-fluid">
    </div> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <?php
            $bannerImages = json_decode($cached_array[0]->cms_data[0]->banner_images);
            $imgno = 0;
            for ($i = 0; $i < count($bannerImages); $i++) {
                if ($i == 0) {
            ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>

                <?php
                } else {
                ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>


                <?php
                }
                ?>
            <?php
            }
            ?>
        </ol>




        <div class="carousel-inner">
            <?php

            foreach ($bannerImages as $img) {
                if ($imgno == 0) {
                    $imgno = 1;
            ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="crm/<?= substr($img->image_url, 8) ?>" alt="First slide">
                    </div>

                <?php } else {
                ?>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="crm/<?= substr($img->image_url, 8) ?>" alt="Second slide">
                    </div>
            <?php
                }
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>
<!-- Landing Section End -->

<!-- package Section Start -->
<section class="package-section">
    <div class="container">
        <div class="package-content">
            <div class="row">
                <div class="col col-12 col-md-12 col-lg-3 col-xl-3 pe-0">
                    <div class="package-item">
                        <div class="package-item-title">
                            <span><i class="fa-solid fa-suitcase"></i></span>
                            <h3 class="package-title">Packages</h3>
                        </div>
                        <p class="package-discription">Popular Family Tour Packages And Delightful Family Vacation Lorem Ipsum Is A Placeholde</p>
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="package-box package-box-animation">
                        <div class="package-img">
                            <img src="images/plane.png" alt="Package_Palne" class="img-fluid">
                        </div>
                        <h6 class="package-box-title">Travel package</h6>
                        <a href="#" class="btn package-box-btn">View more <i class="fa-solid fa-right-long"></i></a>
                        <span class="package-box-circle"></span>
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="package-box">
                        <div class="package-img">
                            <img src="images/adventure.png" alt="Package_Palne" class="img-fluid">
                        </div>
                        <h6 class="package-box-title">Adventure places</h6>
                        <a href="#" class="btn package-box-btn">View more <i class="fa-solid fa-right-long"></i></a>
                        <span class="package-box-circle"></span>
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="package-box trending-package">
                        <div class="package-img">
                            <img src="images/treding.png" alt="Package_Palne" class="img-fluid">
                        </div>
                        <h6 class="package-box-title">Trending places</h6>
                        <a href="#" class="btn package-box-btn">View more <i class="fa-solid fa-right-long"></i></a>
                        <span class="package-box-circle"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- package Section End -->

<!-- Fantasy Section Start -->
<section class="fantasy-section">
    <?php

    $package_tour_data = (($cached_array[0]->cms_data[0]->popular_dest) != '' && $cached_array[0]->cms_data[0]->popular_dest != 'null') ? json_decode($cached_array[0]->cms_data[0]->popular_dest) : [];

    $package_tours = (($cached_array[0]->package_tour_data) != '') ? $cached_array[0]->package_tour_data : [];

    if (sizeof($package_tour_data) != 0) { ?>
        <div class="container">
            <div class="fantasy-content">
                <div class="fantasy-heding text-center">
                    <h6 class="fantasy-subtitle">fantasy</h6>
                    <h2 class="fantasy-title">Travel <span>Packages</span></h2>
                </div>
                <div class="row justify-content-around">

                    <?php

                    $loopIndex = 0;
                    for ($i = 0; $i < sizeof($package_tour_data); $i++) {

                        if ($i > 5) {

                            break;
                        }

                        $package_id = $package_tour_data[$i]->package_id;

                        $url = $package_tour_data[$i]->url;

                        $pos = strstr($url, 'uploads');

                        if ($pos != false) {

                            $newUrl = preg_replace('/(\/+)/', '/', $url);

                            $newUrl1 = BASE_URL . str_replace('../', '', $newUrl);
                        } else {

                            $newUrl1 =  $url;
                        }

                        // Gettign package info

                        $package_array = array();

                        foreach ($package_tours as $subarray) {

                            if (isset($subarray->package_id) && intval($subarray->package_id) == intval($package_id)) {

                                array_push($package_array, $subarray);

                                break;
                            }
                        }

                        //Package file name

                        $package_name = $package_array[0]->package_name;
                        $package_price = $package_array[0]->adult_cost;

                        $package_fname = str_replace(' ', '_', $package_name);

                        $file_name = 'package_tours/' . $package_fname . '-' . $package_id . '.php';



                        $total_days = $package_array[0]->total_days;

                        $total_nights = $package_array[0]->total_nights;

                        $note = $package_array[0]->note;



                        $package_name1 = substr($package_name, 0, 22) . '..';
                        $loopIndex++;
                    ?>

                        <div class="col col-12 col-md-6 col-lg-4 col-xl-4 bob">
                            <div class="fantasy-card">
                                <div class="fantasy-img">
                                    <img src="<?= $newUrl1 ?> " alt="" class="img-fluid">
                                    <span>New</span>
                                    <h5><?= $package_name1 ?></h5>
                                </div>
                                <div class="fantasy-card-body">
                                    <div class="fantasy-details-price">
                                        <del></del>
                                        <span class="fantasy-details-newprice"><small>$</small> <?= $package_price ?></span>
                                        <span>( <?= $total_nights ?> N/<?= $total_days ?> D )</span>
                                    </div>
                                    <a href="<?= $file_name ?>" class="btn fantasy-card-btn">View details
                                        <span><i class="fa-solid fa-right-long"></i></span>
                                    </a>
                                </div>
                                <div class="fantasy-card-details">
                                    <div class="fantasy-details-style">
                                        <img src="images/f_card_style.png" alt="Details_title" class="img-fluid">
                                    </div>
                                    <div class="fantasy-details-title">
                                        <h5><?= $package_name1 ?></h5>
                                    </div>
                                    <div class="fantasy-card-review">
                                        <span class="fantasy-review-no">4.2</span>
                                        <span class="fantasy-review-star">★★★★</span>
                                    </div>
                                    <div class="fantasy-details-phone">
                                        <i class="fa-solid fa-phone"></i>
                                        <span> : <?= $profile->contact_no ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php

                            // <i class="pack-border"></i>
                            if ($loopIndex ==  6) {
                                echo ' <i class="pack-border"></i>';
                            }

                            ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php } ?>
</section>
<!-- Fantasy Section End -->

<!-- Discoun Section Start  -->
<section class="discount-section">
    <div class="container">
        <div class="discount-content">
            <div class="row">
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="discount-img-content">
                        <div class="discount-img">
                            <img src="images/discount_1.png" alt="Dicount_img" class="img-fluid">
                        </div>
                        <div class="discount-img discount-img2 d-none d-md-block">
                            <img src="images/discount_2.png" alt="Dicount_img" class="img-fluid">
                        </div>
                        <div class="discount-percenteg d-none d-lg-block">
                            <span>12</span>
                            <small>%</small>
                            <h3>Discount</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="discount-plan">
                        <h6 class="discount-plan-style">Get to know us</h6>
                        <h2 class="discount-plan-title">Plan your trip with travel</h2>
                        <p class="discount-plane-discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt labore dolore magna aliqua enim ad minim veniam quis nostrud exercitation ulamco</p>
                        <div class="discount-plan-checkbox">
                            <p class="discount-plan-checked">
                                <i class="fa-solid fa-square-check"></i>
                                <span>A Simply Perfect Place To Get Lost</span>
                            </p>
                            <p class="discount-plan-checked">
                                <i class="fa-solid fa-square-check"></i>
                                <span>A place where start new life with place</span>
                            </p>
                            <p class="discount-plan-checked">
                                <i class="fa-solid fa-square-check"></i>
                                <span>Top 10 destination adventure trips</span>
                            </p>
                        </div>
                        <a href="#" class="btn discount-plan-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discoun Section End  -->

<!-- Destination Section Start -->
<section class="destination-section">
    <div class="destination-content">
        <div class="destination-choose-content">
            <div class="destination-choose">
                <span class="destination-choose-style">place to go</span>
                <h2 class="destination-choose-title">
                    Choose your perfect destination and enjoy your travel
                </h2>
                <a href="#" class="btn discount-plan-btn">View More</a>
            </div>
            <div class="destination-slider">
                <?php
                $popularActivities = json_decode($cached_array[0]->cms_data[0]->popular_activities);
                //var_dump($popularActivities);
                $activiyData = $cached_array[0]->activity_data;
                $activitiesAll = array();        
                    foreach($popularActivities as $pAcitivity)
                            {   
                foreach ($activiyData as $data) {
                                    if($pAcitivity->exc_id == $data->activity_id)
                                    {
                                            array_push($activitiesAll,$data);     
                                    }
                                }
                            }
                  

                foreach ($activitiesAll as $data) {
                ?>
                
                    <div class="destination-slider-item">
                    <div class="destination-slider-img">
                    <a href="view/activities/activities-listing.php">        
                    <img src="crm/<?php echo substr(json_decode($data->images_array)[0]->image_url, 6);  ?>" alt="Travel_Place" class="img-fluid">
                            </a>
                            <h3 class="destination-name"><?php echo $data->activity_name;  ?></h3>
                            <span>
                                <!-- 2 tour -->
                            </span>
                        </div>
                    </div>
                <?php  } ?>
                <!-- <div class="destination-slider-item">
                    <div class="destination-slider-img destination-item-two">
                        <img src="images/choose_1.jpg" alt="Travel_Place" class="img-fluid">
                    </div>
                </div>
                <div class="destination-slider-item">
                    <div class="destination-slider-img">
                        <img src="images/choose_3.jpg" alt="Travel_Place" class="img-fluid">
                    </div>
                </div>
                <div class="destination-slider-item">
                    <div class="destination-slider-img destination-item-two">
                        <img src="images/choose_4.jpg" alt="Travel_Place" class="img-fluid">
                    </div>
                </div> -->
            </div>
        </div>

    </div>
</section>
<!-- Destination Section End -->

<!-- Flights Section Start -->
<section class="flights-section">
    <div class="container">
        <div class="flights-content">
            <h6 class="flights-style text-center">Why</h6>
            <h2 class="flights-title text-center"><span>Choose Us</span></h2>
            <div class="row">
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="flights-img">
                        <img src="images/flight_men.png" alt="Flight_Men" class="img-fluid">
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="flights-ruls">

                        <div class="flights-ruls-point">
                            <div class="flights-ruls-img">
                                <img src="images/plane.png" alt="Flight_Plan" class="img-fluid">
                            </div>
                            <div class="flights-point-details">
                                <h4>Flights service</h4>
                                <p>improve your businessLorem ipsum or <br> lipsum as it is used in laying</p>
                            </div>
                            <h2 class="flights-point-no">1</h2>
                            <span class="flights-point-dot"></span>
                        </div>
                        <div class="flights-ruls-point">
                            <div class="flights-ruls-img">
                                <img src="images/support.png" alt="Flight_Plan" class="img-fluid">
                            </div>
                            <div class="flights-point-details">
                                <h4>24/7 Support</h4>
                                <p>improve your businessLorem ipsum or <br> lipsum as it is used in laying</p>
                            </div>
                            <h2 class="flights-point-no">2</h2>
                            <span class="flights-point-dot"></span>
                        </div>
                        <div class="flights-ruls-point">
                            <div class="flights-ruls-img">
                                <img src="images/money.png" alt="Flight_Plan" class="img-fluid">
                            </div>
                            <div class="flights-point-details">
                                <h4>Save money</h4>
                                <p>improve your businessLorem ipsum or <br> lipsum as it is used in laying</p>
                            </div>
                            <h2 class="flights-point-no">3</h2>
                            <span class="flights-point-dot"></span>
                        </div>
                        <div class="flights-ruls-point">
                            <div class="flights-ruls-img">
                                <img src="images/Passenger.png" alt="Flight_Plan" class="img-fluid">
                            </div>
                            <div class="flights-point-details">
                                <h4>Trusted by Clients</h4>
                                <p>improve your businessLorem ipsum or <br> lipsum as it is used in laying</p>
                            </div>
                            <h2 class="flights-point-no">4</h2>
                            <span class="flights-point-dot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Flights Section End -->

<!-- Traveler Section Start -->
<section class="traveler-section">
    <div class="container">
        <div class="traveler-content">
            <div class="traveler-ruls">
                <div class="row">
                    <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="traveler-ruls-point">
                            <h2 class="traveler-point-title">Our Traveler Says</h2>
                            <ul class="traveler-point-list">
                                <li class="traveler-point-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>The Climate Shift in 2022 Allows Venice to Recover</span>
                                </li>
                                <li class="traveler-point-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>New Must-See Architecture Designs in Europe</span>
                                </li>
                                <li class="traveler-point-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Lacinia sociis morbi erat ultricies dictumst</span>
                                </li>
                                <li class="traveler-point-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Lorem non sit vivamus convallis elit mollis</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="traveler-img d-none d-lg-block">
                            <img src="images/traveler_men.png" alt="Traveler_Men" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="traveler-join">
                <div class="traveler-client">
                    <h5 class="traveler-client-title">Why we are the best for our client</h5>
                    <a href="#" class="btn traveler-client-btn">JOIN NOW</a>
                    <span class="traveler-client-triangle"></span>
                </div>
                <div class="traveler-service-point">
                    <div class="traveler-service">
                        <i class="fa-regular fa-handshake"></i>
                        <h6>Friendly <br> pricing Lorem </h6>
                    </div>
                    <div class="traveler-service">
                        <i class="fa-brands fa-bandcamp"></i>
                        <h6>tourism <br> guidance Lorem </h6>
                    </div>
                    <div class="traveler-service">
                        <i class="fa-solid fa-suitcase"></i>
                        <h6>Reliable <br> tourism Lorem </h6>
                    </div>
                    <div class="traveler-service">
                        <i class="fa-solid fa-chart-area"></i>
                        <h6>Ultimate <br> Flexibility Lorem </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Traveler Section End -->

<!-- Tourism Section Start -->
<?php

$package_tour_data = (($cached_array[0]->cms_data[0]->popular_dest) != '' && $cached_array[0]->cms_data[0]->popular_dest != 'null') ? json_decode($cached_array[0]->cms_data[0]->popular_dest) : [];

$package_tours = (($cached_array[0]->package_tour_data) != '') ? $cached_array[0]->package_tour_data : [];

if (sizeof($package_tour_data) != 0) { ?>
    <section class="tourism-section">
        <div class="container">
            <div class="tourism-content">
                <div class="fantasy-heding text-center">
                    <h6 class="fantasy-subtitle">seasonal</h6>
                    <h2 class="fantasy-title">Tourism <span> Packages</span></h2>
                </div>
                <div class="tourism-tabs-content">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="honeymoon-tab" data-bs-toggle="tab" data-bs-target="#honeymoon" type="button" role="tab" aria-controls="honeymoon" aria-selected="true">
                                <span class="nav-tabs-icon"><i class="fa-solid fa-plane"></i></span>
                                All
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family" type="button" role="tab" aria-controls="family" aria-selected="false">
                                <span class="nav-tabs-icon"><i class="fa-solid fa-building-columns"></i></span>
                                Family Package</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends" type="button" role="tab" aria-controls="friends" aria-selected="false">
                                <span class="nav-tabs-icon"><i class="fa-solid fa-life-ring"></i></span>
                                Friends Package</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">
                                <span class="nav-tabs-icon"><i class="fa-solid fa-flag"></i></span>
                                Team Package</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="honeymoon" role="tabpanel" aria-labelledby="honeymoon-tab">
                            <div class="tourism-card-slider">
                                <?php


                                for ($i = 0; $i < sizeof($package_tour_data); $i++) {

                                    if ($i > 5) {

                                        break;
                                    }

                                    $package_id = $package_tour_data[$i]->package_id;

                                    $url = $package_tour_data[$i]->url;

                                    $pos = strstr($url, 'uploads');

                                    if ($pos != false) {

                                        $newUrl = preg_replace('/(\/+)/', '/', $url);

                                        $newUrl1 = BASE_URL . str_replace('../', '', $newUrl);
                                    } else {

                                        $newUrl1 =  $url;
                                    }

                                    // Gettign package info

                                    $package_array = array();

                                    foreach ($package_tours as $subarray) {

                                        if (isset($subarray->package_id) && intval($subarray->package_id) == intval($package_id)) {

                                            array_push($package_array, $subarray);

                                            break;
                                        }
                                    }

                                    //Package file name

                                    $package_name = $package_array[0]->package_name;
                                    $package_price = $package_array[0]->adult_cost;

                                    $package_fname = str_replace(' ', '_', $package_name);

                                    $file_name = 'package_tours/' . $package_fname . '-' . $package_id . '.php';



                                    $total_days = $package_array[0]->total_days;

                                    $total_nights = $package_array[0]->total_nights;

                                    $note = $package_array[0]->note;



                                    $package_name1 = substr($package_name, 0, 22) . '..';

                                ?>
                                    <div class="tourism-card-item">
                                        <div class="tourism-tabs-body">
                                            <div class="tourism-tabs-img">
                                                <img src="<?= $newUrl1 ?>" alt="Tourisms" class="img-fluid">
                                                <a href="#"><span>20% OFF</span></a>
                                                <a href="#"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="tourism-rooms-booking">
                                                <div class="tourism-booking-service">
                                                    <span>Hotels</span>
                                                    <span>New bulinding</span>
                                                    <span>Top value</span>
                                                </div>
                                                <h5 class="tourism-booking-title"><?= $package_name1 ?></h5>
                                                <div class="tourism-rooms-service">
                                                    <h6><i class="fa-solid fa-martini-glass-empty"></i><span>optional</span></h6>
                                                    <h6><i class="fa-solid fa-bed"></i><span>Food</span> </h6>
                                                    <h6><i class="fa-solid fa-leaf"></i><span>outdoor bbq</span> </h6>
                                                    <h6><i class="fa-solid fa-bath"></i><span>swimming</span> </h6>
                                                </div>
                                                <div class="tourism-booking-footer">
                                                    <div class="tourism-booking-btn">
                                                        <a href="<?= $file_name ?>" class="btn discount-plan-btn">Book Now</a>
                                                    </div>
                                                    <div class="tourism-booking-review">
                                                        <span class="tourism-review-rating">4.0</span>
                                                        <span class="tourism-review-title">Good</span>
                                                        <span class="fantasy-review-star tourism-review-star">★★★★</span>
                                                    </div>
                                                    <div class="tourism-booking-price">
                                                        <del class="tourism-old-price">$999999/</del>
                                                        <h2 class="tourism-new-price">
                                                            <?php echo  $package_price;
                                                            //echo $data->adult_cost; 
                                                            ?>
                                                            <b><?= $total_nights ?> N, <?= $total_days ?> D</b>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                            <div class="tourism-card-slider">
                                <?php


                                for ($i = 0; $i < sizeof($package_tour_data); $i++) {

                                    if ($i > 5) {

                                        break;
                                    }

                                    $package_id = $package_tour_data[$i]->package_id;

                                    $url = $package_tour_data[$i]->url;

                                    $pos = strstr($url, 'uploads');

                                    if ($pos != false) {

                                        $newUrl = preg_replace('/(\/+)/', '/', $url);

                                        $newUrl1 = BASE_URL . str_replace('../', '', $newUrl);
                                    } else {

                                        $newUrl1 =  $url;
                                    }

                                    // Gettign package info

                                    $package_array = array();

                                    foreach ($package_tours as $subarray) {

                                        if (isset($subarray->package_id) && intval($subarray->package_id) == intval($package_id)) {

                                            array_push($package_array, $subarray);

                                            break;
                                        }
                                    }

                                    //Package file name

                                    $package_name = $package_array[0]->package_name;
                                    $package_price = $package_array[0]->adult_cost;

                                    $package_fname = str_replace(' ', '_', $package_name);

                                    $file_name = 'package_tours/' . $package_fname . '-' . $package_id . '.php';



                                    $total_days = $package_array[0]->total_days;

                                    $total_nights = $package_array[0]->total_nights;

                                    $note = $package_array[0]->note;



                                    $package_name1 = substr($package_name, 0, 22) . '..';

                                ?>
                                    <div class="tourism-card-item">
                                        <div class="tourism-tabs-body">
                                            <div class="tourism-tabs-img">
                                                <img src="<?= $newUrl1 ?>" alt="Tourisms" class="img-fluid">
                                                <a href="#"><span>20% OFF</span></a>
                                                <a href="#"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="tourism-rooms-booking">
                                                <div class="tourism-booking-service">
                                                    <span>Hotels</span>
                                                    <span>New bulinding</span>
                                                    <span>Top value</span>
                                                </div>
                                                <h5 class="tourism-booking-title"><?= $package_name1 ?></h5>
                                                <div class="tourism-rooms-service">
                                                    <h6><i class="fa-solid fa-martini-glass-empty"></i><span>optional</span></h6>
                                                    <h6><i class="fa-solid fa-bed"></i><span>Food</span> </h6>
                                                    <h6><i class="fa-solid fa-leaf"></i><span>outdoor bbq</span> </h6>
                                                    <h6><i class="fa-solid fa-bath"></i><span>swimming</span> </h6>
                                                </div>
                                                <div class="tourism-booking-footer">
                                                    <div class="tourism-booking-btn">
                                                        <a href="<?= $file_name ?>" class="btn discount-plan-btn">Book Now</a>
                                                    </div>
                                                    <div class="tourism-booking-review">
                                                        <span class="tourism-review-rating">4.0</span>
                                                        <span class="tourism-review-title">Good</span>
                                                        <span class="fantasy-review-star tourism-review-star">★★★★</span>
                                                    </div>
                                                    <div class="tourism-booking-price">
                                                        <del class="tourism-old-price">$999999/</del>
                                                        <h2 class="tourism-new-price">
                                                            <?php echo  $package_price;
                                                            //echo $data->adult_cost; 
                                                            ?>
                                                            <b><?= $total_nights ?> N, <?= $total_days ?> D</b>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                            <div class="tourism-card-slider">
                                <?php


                                for ($i = 0; $i < sizeof($package_tour_data); $i++) {

                                    if ($i > 5) {

                                        break;
                                    }

                                    $package_id = $package_tour_data[$i]->package_id;

                                    $url = $package_tour_data[$i]->url;

                                    $pos = strstr($url, 'uploads');

                                    if ($pos != false) {

                                        $newUrl = preg_replace('/(\/+)/', '/', $url);

                                        $newUrl1 = BASE_URL . str_replace('../', '', $newUrl);
                                    } else {

                                        $newUrl1 =  $url;
                                    }

                                    // Gettign package info

                                    $package_array = array();

                                    foreach ($package_tours as $subarray) {

                                        if (isset($subarray->package_id) && intval($subarray->package_id) == intval($package_id)) {

                                            array_push($package_array, $subarray);

                                            break;
                                        }
                                    }

                                    //Package file name

                                    $package_name = $package_array[0]->package_name;
                                    $package_price = $package_array[0]->adult_cost;

                                    $package_fname = str_replace(' ', '_', $package_name);

                                    $file_name = 'package_tours/' . $package_fname . '-' . $package_id . '.php';



                                    $total_days = $package_array[0]->total_days;

                                    $total_nights = $package_array[0]->total_nights;

                                    $note = $package_array[0]->note;



                                    $package_name1 = substr($package_name, 0, 22) . '..';

                                ?>
                                    <div class="tourism-card-item">
                                        <div class="tourism-tabs-body">
                                            <div class="tourism-tabs-img">
                                                <img src="<?= $newUrl1 ?>" alt="Tourisms" class="img-fluid">
                                                <a href="#"><span>20% OFF</span></a>
                                                <a href="#"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="tourism-rooms-booking">
                                                <div class="tourism-booking-service">
                                                    <span>Hotels</span>
                                                    <span>New bulinding</span>
                                                    <span>Top value</span>
                                                </div>
                                                <h5 class="tourism-booking-title"><?= $package_name1 ?></h5>
                                                <div class="tourism-rooms-service">
                                                    <h6><i class="fa-solid fa-martini-glass-empty"></i><span>optional</span></h6>
                                                    <h6><i class="fa-solid fa-bed"></i><span>Food</span> </h6>
                                                    <h6><i class="fa-solid fa-leaf"></i><span>outdoor bbq</span> </h6>
                                                    <h6><i class="fa-solid fa-bath"></i><span>swimming</span> </h6>
                                                </div>
                                                <div class="tourism-booking-footer">
                                                    <div class="tourism-booking-btn">
                                                        <a href="<?= $file_name ?>" class="btn discount-plan-btn">Book Now</a>
                                                    </div>
                                                    <div class="tourism-booking-review">
                                                        <span class="tourism-review-rating">4.0</span>
                                                        <span class="tourism-review-title">Good</span>
                                                        <span class="fantasy-review-star tourism-review-star">★★★★</span>
                                                    </div>
                                                    <div class="tourism-booking-price">
                                                        <del class="tourism-old-price">$999999/</del>
                                                        <h2 class="tourism-new-price">
                                                            <?php echo  $package_price;
                                                            //echo $data->adult_cost; 
                                                            ?>
                                                            <b><?= $total_nights ?> N, <?= $total_days ?> D</b>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                            <div class="tourism-card-slider">
                                <?php


                                for ($i = 0; $i < sizeof($package_tour_data); $i++) {

                                    if ($i > 5) {

                                        break;
                                    }

                                    $package_id = $package_tour_data[$i]->package_id;

                                    $url = $package_tour_data[$i]->url;

                                    $pos = strstr($url, 'uploads');

                                    if ($pos != false) {

                                        $newUrl = preg_replace('/(\/+)/', '/', $url);

                                        $newUrl1 = BASE_URL . str_replace('../', '', $newUrl);
                                    } else {

                                        $newUrl1 =  $url;
                                    }

                                    // Gettign package info

                                    $package_array = array();

                                    foreach ($package_tours as $subarray) {

                                        if (isset($subarray->package_id) && intval($subarray->package_id) == intval($package_id)) {

                                            array_push($package_array, $subarray);

                                            break;
                                        }
                                    }

                                    //Package file name

                                    $package_name = $package_array[0]->package_name;
                                    $package_price = $package_array[0]->adult_cost;

                                    $package_fname = str_replace(' ', '_', $package_name);

                                    $file_name = 'package_tours/' . $package_fname . '-' . $package_id . '.php';



                                    $total_days = $package_array[0]->total_days;

                                    $total_nights = $package_array[0]->total_nights;

                                    $note = $package_array[0]->note;



                                    $package_name1 = substr($package_name, 0, 22) . '..';

                                ?>
                                    <div class="tourism-card-item">
                                        <div class="tourism-tabs-body">
                                            <div class="tourism-tabs-img">
                                                <img src="<?= $newUrl1 ?>" alt="Tourisms" class="img-fluid">
                                                <a href="#"><span>20% OFF</span></a>
                                                <a href="#"><i class="fa-regular fa-heart"></i></a>
                                            </div>
                                            <div class="tourism-rooms-booking">
                                                <div class="tourism-booking-service">
                                                    <span>Hotels</span>
                                                    <span>New bulinding</span>
                                                    <span>Top value</span>
                                                </div>
                                                <h5 class="tourism-booking-title"><?= $package_name1 ?></h5>
                                                <div class="tourism-rooms-service">
                                                    <h6><i class="fa-solid fa-martini-glass-empty"></i><span>optional</span></h6>
                                                    <h6><i class="fa-solid fa-bed"></i><span>Food</span> </h6>
                                                    <h6><i class="fa-solid fa-leaf"></i><span>outdoor bbq</span> </h6>
                                                    <h6><i class="fa-solid fa-bath"></i><span>swimming</span> </h6>
                                                </div>
                                                <div class="tourism-booking-footer">
                                                    <div class="tourism-booking-btn">
                                                        <a href="<?= $file_name ?>" class="btn discount-plan-btn">Book Now</a>
                                                    </div>
                                                    <div class="tourism-booking-review">
                                                        <span class="tourism-review-rating">4.0</span>
                                                        <span class="tourism-review-title">Good</span>
                                                        <span class="fantasy-review-star tourism-review-star">★★★★</span>
                                                    </div>
                                                    <div class="tourism-booking-price">
                                                        <del class="tourism-old-price">$999999/</del>
                                                        <h2 class="tourism-new-price">
                                                            <?php echo  $package_price;
                                                            //echo $data->adult_cost; 
                                                            ?>
                                                            <b><?= $total_nights ?> N, <?= $total_days ?> D</b>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
<!-- Tourism Section End -->

<!-- Testimonials Section Start -->
<?php

$customerTestimonials = $cached_array[0]->cms_data[4]->customer_testimonials;

?>
<section class="testimonials-section">
    <div class="testimonials">
        <div class="container">
            <div class="testimonials-content">
                <div class="testimonials-title-content">
                    <span class="testimonials-style">Testimonails</span>
                    <h2 class="testimonials-title">Trusted by more than 4k clints are lorem</h2>
                </div>
                <div class="testimonials-slider">
                    <?php
                    if (count($customerTestimonials) > 2) {
                        foreach ($customerTestimonials as $testimonial) { ?>
                            <div class="testimonials-item">
                                <div class="testimonials-discription">
                                    <span>★★★★★ <small>(18 Reviews)</small></span>
                                    <p><?= substr($testimonial->testm, 0, 200) ?>...</p>
                                </div>
                                <!-- substr( $string_n, 0, 7 ) -->
                                <div class="testimonials-client-profile">
                                    <img src="crm/<?= substr($testimonial->image, 8) ?>" alt="Client" class="img-fluid">
                                    <h4 class="testimonials-client-name"><?= $testimonial->name ?> <small><?= $testimonial->designation ?></small></h4>
                                </div>
                            </div>

                    <?php }
                    } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Section End -->

<!-- Never Section Start -->
<section class="never-section">
    <div class="never-content">
        <h2 class="never-title text-center">NEVER ENDING JOURNEYS</h2>
        <p class="never-discription text-center">Lorem ipsum dolor sit amet, pri in persius oporteat, usu ex erat aperiam nusquam. His liber verear <br class="d-none d-lg-block"> ornatus eu. Nobis regione patrioque pri te.</p>
        <div class="never-country-content">
            <div class="never-country">

                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>Australia</h6>
                        <small>March 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_1.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>Italy</h6>
                        <small>May 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_2.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>Greece</h6>
                        <small>March 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_3.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_1.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_2.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo_3.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>
                <div class="never-contry-travel">
                    <img src="images/never_location.png" alt="Location" class="img-fluid never-location-icon">
                    <img src="images/country_logo.png" alt="Country_Logo" class="img-fluid never-country-logo">
                    <div class="never-country-title">
                        <h6>PERU</h6>
                        <small>JUN 2022</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Never Section End -->

<!-- Experts Section Start -->
<section class="experts-section">
    <div class="container">
        <div class="experts-content">
            <div class="fantasy-heding text-center">
                <h6 class="fantasy-subtitle">Meet our</h6>
                <h2 class="fantasy-title">Travel <span>Experts</span></h2>
            </div>
            <div class="row">
                <div class="col col-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="experts-card">
                        <div class="experts-img">
                            <img src="images/exp_1.jpg" alt="Experts" class="img-fluid w-100 h-100">
                        </div>
                        <div class="experts-card-body">
                            <div class="experts-body-social">
                                <ul class="experts-social-list">
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="experts-body-title">Henry</h5>
                            <p class="experts-body-discription">right soloution guide</p>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="experts-card">
                        <div class="experts-img">
                            <img src="images/exp_2.jpg" alt="Experts" class="img-fluid w-100 h-100">
                        </div>
                        <div class="experts-card-body">
                            <div class="experts-body-social">
                                <ul class="experts-social-list">
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="experts-body-title">Oliver</h5>
                            <p class="experts-body-discription">saftey travel system</p>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="experts-card">
                        <div class="experts-img">
                            <img src="images/exp_3.jpg" alt="Experts" class="img-fluid w-100 h-100">
                        </div>
                        <div class="experts-card-body">
                            <div class="experts-body-social">
                                <ul class="experts-social-list">
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="experts-body-title">fields</h5>
                            <p class="experts-body-discription">expert trip planning</p>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="experts-card">
                        <div class="experts-img">
                            <img src="images/exp_4.jpg" alt="Experts" class="img-fluid w-100 h-100">
                        </div>
                        <div class="experts-card-body">
                            <div class="experts-body-social">
                                <ul class="experts-social-list">
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="experts-social-item">
                                        <a href="#" class="experts-social-link">
                                            <i class="fa-brands fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="experts-body-title">Richard</h5>
                            <p class="experts-body-discription">expert trip planning</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Experts Section End -->

<!-- Offers Section Start -->
<section class="offers-section">
    <div class="container">
        <div class="offers-content">
            <div class="row">
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="offers-details">
                        <h2 class="offers-title">Discount <span>20-30% Off</span><br class="d-none d-md-block"> journeys save money</h2>
                        <p class="offers-discription">Popular Family Tour Packages and Delightful family <br class="d-none d-md-block"> Vacation Lorem ipsum is a placeholde</p>
                        <a href="#" class="btn discount-plan-btn offers-btn">Book Now</a>
                    </div>
                </div>
                <div class="col col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="offers-contact">
                        <div class="offer-contact-email">
                            <i class="fa-regular fa-envelope"></i>
                            <h6 class="offers-contact-title">
                                Send us an email <br>
                                <span>Contact@loki.com</span>
                            </h6>
                        </div>
                        <div class="offer-contact-email">
                            <i class="fa-solid fa-phone"></i>
                            <h6 class="offers-contact-title">
                                Give us a call <br>
                                <span>(120) 801 - 1901</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Offers Section End -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields

    (function() {

        'use strict';

        window.addEventListener('load', function() {

            // Fetch all the forms we want to apply custom Bootstrap validation styles to

            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission

            var validation = Array.prototype.filter.call(forms, function(form) {

                form.addEventListener('submit', function(event) {

                    if (form.checkValidity() === false) {

                        event.preventDefault();

                        event.stopPropagation();

                    }

                    form.classList.add('was-validated');

                }, false);

            });

        }, false);

    })();
</script>

<?php

include 'layouts/footer.php';

?>
<script type="text/javascript" src="js/bootstrap5.bundle.min.js"></script>
<script type="text/javascript" src="view/hotel/js/index.js"></script>

<script type="text/javascript" src="view/transfer/js/index.js"></script>

<script type="text/javascript" src="view/activities/js/index.js"></script>

<script type="text/javascript" src="view/tours/js/index.js"></script>

<script type="text/javascript" src="view/group_tours/js/index.js"></script>

<script type="text/javascript" src="js/aos.js"></script>

<script type="text/javascript" src="js/slick.min.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" src="js/scripts.js"></script>

<script>
    $(document).ready(function() {

        /////// Next 10th day onwards date display

        var tomorrow = new Date();

        tomorrow.setDate(tomorrow.getDate() + 10);

        var day = tomorrow.getDate();

        var month = tomorrow.getMonth() + 1

        var year = tomorrow.getFullYear();

        $('#travelDate').datetimepicker({
            timepicker: false,
            format: 'm/d/Y',
            minDate: tomorrow
        });



        $('#checkInDate, #checkOutDate, #checkDate').datetimepicker({
            timepicker: false,
            format: 'm/d/Y',
            minDate: new Date()
        });

        $('#pickup_date').datetimepicker({
            format: 'm/d/Y H:i',
            minDate: new Date()
        });

        document.getElementById('return_date').readOnly = true;



        var service = '<?php echo $service; ?>';

        if (service && (service !== '' || service !== undefined)) {

            var checkLink = $('.c-searchContainer .c-search-tabs li');

            var checkTab = $('.c-searchContainer .search-tab-content .tab-pane');

            checkLink.each(function() {

                var child = $(this).children('.nav-link');

                if (child.data('service') === service) {

                    $(this).siblings().children('.nav-link').removeClass('active');

                    child.addClass('active');

                }

            });

            checkTab.each(function() {

                if ($(this).data('service') === service) {

                    $(this).addClass('active show').siblings().removeClass('active show');

                }

            })

        }

    });
</script>