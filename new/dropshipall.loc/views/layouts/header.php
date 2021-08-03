<?php

use yii\helpers\Url;

?>
<header class="header">
    <div class="head-cont container">
        <div class="header__content">
            <button class="menu-btn reset-btn" id="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <a href="/" class="header-logo">
                <picture>
                    <source srcset="/images/Logo.svg" media="(min-width: 576px)">
                    <img src="images/mobLogo.svg" alt="Dropshipall">
                </picture>
            </a>

            <nav class="header-nav" id="header-nav">
                <ul class="header-list">
                    <li>
                        <a href="/" class="link active">Home</a>
                    </li>
                    <li>
                        <a href="#features-section" class="link">Features</a>
                    </li>
                    <li>
                        <a href="#features-section-video" class="link">Learn</a>
                    </li>
                    <li>
                        <a href="<?= Url::toRoute('pricing') ?>" class="link">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="link" id="contacts-link">Contacts</a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-primary"><span>Get the app</span></a>
                    </li>
                </ul>
            </nav>

            <div class="d-flex header__buttons">
                <a href="#" class="btn btn-secondary" id="sign-up"><span>Sign Up</span></a>
                <a href="https://apps.shopify.com/dropshipall?surface_detail=finding-and-adding-products-dropshipping&surface_inter_position=3&surface_intra_position=24&surface_type=category"
                   class="btn btn-primary">
                    <span>Get the app</span>
                </a>
            </div>
        </div>
    </div>
</header>
