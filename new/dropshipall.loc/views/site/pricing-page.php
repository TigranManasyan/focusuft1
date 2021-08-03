<main>
    <section class="pricing-section">
        <div class="container">
            <div class="title-center">
                <h1 class="h2 title"><span>Plans & Pricing</span></h1>
                <p class="title-center__text">Start Dropshipping for Free <br/>No credit card required.</p>
                <span class="for-style"></span>
            </div>

            <div class="pricing-list">
                <?php foreach ($plans as $plan ):?>

                <div class=" <?php
                if ($plan->id == 2) {
                    echo 'premium-and-free starter';
                } elseif ($plan->id == 3) {
                    echo 'premium-and-free premium';
                } else {
                    echo 'premium-and-free free';
                }
                ?>">
                    <div class="buy-premium-header">
                        <span class="<?php
                            if ($plan->id == 2) {
                                echo 'icon icon-rocket';
                            } elseif ($plan->id == 3) {
                                echo 'icon icon-coin';
                            } else {
                                echo 'icon icon-cup-free';
                             }


                        ?>">

                        </span>
                        <strong class="h2">
                            <span class="first"><?=$plan->name?></span>
                            <span class="h2"><?=$plan->price?></span>
                            <span>$/month</span>
                        </strong>
                    </div>
                    <ul class="buy-premium-block">
                        <li>Import more than <?= $plan->product_limit ?> products</li>
                        <li>More than <?= $plan->variant_limit ?> variants</li>
                        <li>Choose more than <?= $plan->review_limit ?> reviews</li>
                        <li>Platforms like Aliexpress and Shein</li>
                    </ul>
                    <div class="open-closead-block">
                        <div class="open-close-top">
                            <h3 class="h3">In this price:</h3>
                            <p class="sub-title">Different for each variant</p>
                        </div>
                        <div class="logo-icons-block">
                        <?php foreach ($plan->planFeatures as $plan_feature):?>
                            <span> <?= $plan_feature->feature->name?></span>
                        <?php endforeach;?>


                        </div>
                        <div class="compani-logo">
                            <strong class="h3">Companies:</strong>
                            <p class="sub-title"><?= count($plan->planSites)?> most reputable companies</p>
                            <div class="compani-logo-block">
                             <?php foreach ($plan->planSites as $planSite):?>

                                <div class="item"><img class="logo-img" src="/images/companys/<?=$planSite->site->name?>.png" alt=""></div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                    <div class="buy-footer-button-group">
                        <button class="btn btn-primary">
                            <span>Get the app</span>
                        </button>
                        <div class="foot-text">
                            <p>In this price include all taxes and charges</p>
                        </div>
                        <button class="btn-circle show-logo-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="active" width="48" height="48" viewBox="0 0 48 48">
                                <path fill="#818f9b" class="a" d="M24,48A24,24,0,1,0,0,24,24,24,0,0,0,24,48Z"/>
                                <rect fill="#fff" width="14" height="4" rx="1" transform="translate(21.172 35.606) rotate(-45)"/>
                                <rect fill="#fff" width="14" height="4" rx="1" transform="translate(16.929 25.707) rotate(45)"/>
                                <text fill="#fff" class="c" transform="translate(24 21)">
                                    <tspan x="-14" y="0">more</tspan>
                                </text>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                <path fill="#818f9b" class="a" d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"/>
                                <rect fill="#fff" width="14" height="4" rx="1" transform="translate(24 9.565) rotate(45)"/>
                                <rect fill="#fff" width="14" height="4" rx="1" transform="translate(14.101 19.465) rotate(-45)"/>
                                <text fill="#fff" class="c" transform="translate(24 36)">
                                    <tspan x="-11.01" y="0">less</tspan>
                                </text>
                            </svg>
                        </button>
                    </div>
                </div>
                <?php endforeach;?>

            </div>

        </div>
    </section>

    <section class="pricing-download">
        <div class="container">
            <div class="main-download-block">
                <div class="main-download-block-container">
                    <h2 class="h2">Get Chrome extension</h2>
                    <div class="text-18">
                        <p>With the help of our Chrome Extension you can add products directly from various websites.</p>
                    </div>
                    <button class="btn btn-secondary"><span>Install Chrome Extension</span></button>
                </div>
            </div>
        </div>
    </section>
</main>
