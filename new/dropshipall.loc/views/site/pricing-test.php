<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropshipall</title>

</head>
<body>


<main>
    <section class="pricing-section">
        <div class="container">
            <div class="title-center">
                <h2 class="h2 title"><span>Plans & Pricing</span></h2>
                <p class="title-center__text">Start Dropshipping for Free No credit card required.</p>
                <span class="for-style"></span>
            </div>

            <div class="pricing-list">
                <?php foreach ($plans as $plan): ?>

                    <div class="premium-and-free">
                        <div class="<?php
                        if ($plan->id == 2) {
                            echo 'buy-premium-header standart';
                        } elseif ($plan->id == 3) {
                            echo 'buy-premium-header premium';
                        } else {
                            echo 'buy-premium-header';
                        }


                        ?>">
                        <span class="<?php
                        if ($plan->id == 2) {
                            echo 'icon-rocket';
                        } elseif ($plan->id == 3) {
                            echo 'icon-coin';
                        } else {
                            echo 'icon-cup-free';
                        }


                        ?>"></span>
                            <h2><?= $plan->name ?></h2>
                        </div>
                        <div class="buy-main">
                            <div class="buy-premium-main">
                                <h2><?= $plan->price ?><span>$/month</span></h2>
                            </div>
                        </div>
                        <div class="<?php
                        if ($plan->id == 2) {
                            echo 'buy-premium-block standat-block';
                        } elseif ($plan->id == 3) {
                            echo 'buy-premium-block premium-block';
                        } else {
                            echo 'buy-premium-block';
                        }


                        ?>">

                            <span>• Import more than <?= $plan->product_limit ?> products</span>
                            <span>• More than <?= $plan->variant_limit ?> variants</span>
                            <span>• Choose more than <?= $plan->review_limit ?> reviews</span>
                            <span>• Platforms like Aliexpress and Shein</span>
                        </div>
                        <div class="open-closead-block" style="display: none;">
                            <h3>In this price:</h3>
                            <p>Different for each variant</p>
                            <div class="logo-icons-block"><?php

                                foreach ($plan->planFeatures as $plan_feature):?>
                                    <span> <?= $plan_feature->feature->name?></span>
                                <?php endforeach;?>

                            </div>
                            <div class="compani-logo">
                                <h3>Companies:</h3>
                                <p><?= count($plan->planSites)?> most reputable companies</p>
                                <div class="compani-logo-block">
                                    <?php foreach ($plan->planSites as $plan_site):?>
                                        <div>
                                            <img src="/images/compamys/<?=$plan_site->site->name ?>.png" alt="">
                                            <?= $plan_site->site->name?>

                                        </div>

                                    <?php endforeach;?>

                                </div>
                            </div>
                        </div>
                        <div class="buy-footer-button-group">
                            <button class="btn btn-primary"><span>
                        Get the app
                    </span></button>
                            <div>
                                <p>In this price include </p>
                                <p> all taxes and charges</p>
                            </div>

                            <button class="btn-circle open-permium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="48" height="48"
                                     viewBox="0 0 48 48">
                                    <path fill="#818f9b" class="a"
                                          d="M24,48A24,24,0,1,0,0,24,24,24,0,0,0,24,48Z"></path>
                                    <rect fill="#fff" width="14" height="4" rx="1"
                                          transform="translate(21.172 35.606) rotate(-45)"></rect>
                                    <rect fill="#fff" width="14" height="4" rx="1"
                                          transform="translate(16.929 25.707) rotate(45)"></rect>
                                    <text fill="#fff" transform="translate(21 21)">
                                        <tspan x="-14.118" y="0">more</tspan>
                                    </text>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="isOpen" width="48" height="48"
                                     viewBox="0 0 48 48">
                                    <path fill="#818f9b" class="a" d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"></path>
                                    <rect fill="#fff" width="14" height="4" rx="1"
                                          transform="translate(24 9.565) rotate(45)"></rect>
                                    <rect fill="#fff" width="14" height="4" rx="1"
                                          transform="translate(14.101 19.465) rotate(-45)"></rect>
                                    <text fill="#fff" transform="translate(21 36)">
                                        <tspan x="-11.01" y="0">less</tspan>
                                    </text>
                                </svg>
                            </button>


                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <section class="pricing-download">
        <div class="container">
            <div class="main-download-block">
                <div class="main-download-block-container">
                    <h2 class="h2">Get Chrome extension</h2>
                    <div class="text-18">
                        <p>With the help of our Chrome Extension you can add products directly from various
                            websites.</p>
                    </div>
                    <a href="https://chrome.google.com/webstore/detail/dropshipall/fpgnjacboogigbfnlemfjfeoefijihhd?utm_source=chrome-ntp-icon" class="btn btn-secondary"><span>Install</span></a>
                </div>
            </div>
        </div>
    </section>
</main>


<div class="blur-bg"></div>
<button class="btn-circle scroll-top" id="scroll-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
        <g transform="translate(-12 -75.899)">
            <path fill="#818f9b" class="a" d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                  transform="translate(12 75.899)"/>
            <rect fill="#fff" width="14" height="4" rx="1" transform="translate(36 91.9) rotate(45)"/>
            <rect fill="#fff" width="14" height="4" rx="1" transform="translate(26.101 101.799) rotate(-45)"/>
        </g>
    </svg>
</button>

<!--Login-->
<div class="sign-in">
    <div class="button-icon-block">
        <button id='close-sign' class="btn-circle-cansel">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                <g transform="translate(-12 -75.899)">
                    <circle fill="#818f9b" class="a" cx="24" cy="24" r="24" transform="translate(12 75.899)"></circle>
                    <rect fill="#fff" width="24" height="4" rx="1"
                          transform="translate(28.929 90.101) rotate(45)"></rect>
                    <rect fill="#fff" width="24" height="4" rx="1"
                          transform="translate(26.101 107.071) rotate(-45)"></rect>
                </g>
            </svg>
        </button>
    </div>
    <div class="sign-in-block">
        <h2 class="h2">Sign in</h2>
        <p class="title-text">Insert your Shopify store name.</p>
        <label class="form-label">
            <span class="form-label__text">Store Name*<sup>*</sup></span>
            <input type="text" class="form-element" placeholder="Surname">
            <span class="form-label__error">Wrong mail</span>
        </label>
        <div class="button-sign-in">
            <button class="btn btn-primary"><span>Get the app</span></button>
            <p class="button-bottom-texts">
                By sign in you accept our
            </p>
            <p class="button-bottom-texts"><span>Terms of Service</span> and <span>Privacy Policy</span></p>
        </div>
    </div>
</div>

<!--Thank you-->
<div class="modal">
    <div class="modal-block">
        <h2>Thank you</h2>
        <p>your submission has been sent.</p>
        <button class="btn btn-additionally"><span>Done</span></button>
    </div>
</div>

<!--Contact modal-->
<div class="contacts-modal" id="contacts-modal">
    <div class="con">
        <button class="btn-circle close-contact">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                <g transform="translate(-12 -75.899)">
                    <circle fill="#818f9b" class="a" cx="24" cy="24" r="24" transform="translate(12 75.899)"/>
                    <rect fill="#fff" width="24" height="4" rx="1" transform="translate(28.929 90.101) rotate(45)"/>
                    <rect fill="#fff" width="24" height="4" rx="1" transform="translate(26.101 107.071) rotate(-45)"/>
                </g>
            </svg>
        </button>
        <div class="registration-con">
            <div class="registration-inputs-modal">
                <div class="registration-input-block-title">
                    <h2 class="h2 mb-5">Just say hello</h2>
                    <p class="title-center__text">Tell us how can we help you.</p>
                </div>
                <form class="inputs-form">
                    <span>name</span>
                    <div class="form-group">
                        <label class="name-inputs-blo">
                            <input type="text" class="form-element" placeholder="Name">
                            <span class="form-label__error">Wrong  Name</span>
                        </label>
                        <label>
                            <input type="text" class="form-element" placeholder="Surname">
                            <span class="form-label__error">Wrong  mail</span>
                        </label>
                    </div>
                    <span>mail</span>
                    <div class="form-group">
                        <label class="name-inputs-blo">
                            <input type="text" class="form-element" placeholder="Email">
                            <span class="form-label__error">Wrong  Email</span>
                        </label>
                        <label>
                            <input type="text" class="form-element" placeholder="Subject">
                            <span class="form-label__error">Wrong  Subject</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <textarea placeholder="Write here…" class="form-element" cols="30" rows="10"></textarea>
                        </label>
                    </div>
                    <div class="form-button-block d-flex">
                        <button class="btn btn-additionally"><span>Send</span></button>
                    </div>
                </form>

            </div>
            <div class="info-block">
                <div class="footer-info-contact-block lin">
                    <h3>Contacts</h3>
                    <p>Use call or email for contact us.</p>
                    <div><span class="icon-email"></span>
                        <p>Example.example@mail.com</p></div>
                    <div><span class="icon-phone"></span>
                        <p>5624561784652387645928</p></div>
                    <div><span class="icon-address"></span>
                        <p>Address, Address/45, Nicaragua</p></div>
                </div>
                <div class="footer-info-contact-block">
                    <h3>Follow us</h3>
                    <p>Let’s talk in social.</p>
                    <div class="icons-block">
                        <a href="#"><span class="icon icon-fb"></span></a>
                        <a href="#"><span class="icon icon-whatsapp"></span></a>
                        <a href="#"><span class="icon icon-youtube"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
