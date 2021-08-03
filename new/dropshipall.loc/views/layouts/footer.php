<?php

use yii\helpers\Url;

?>
<footer class="footer">
    <div class="footer-header">
        <div class="container">
            <div class="text-18">
                <p class="">Join DSA newsletter and be among the first ones to receive our latest news and offers</p>
                <p class="unsubscribe-text">You can easily unsubscribe at any time.</p>
            </div>
            <form action="#" class="search-block">
                <input type="text" class="form-element grow-1" placeholder="Enter your Email"/>
                <button class="btn btn-additionally shrink-0" type="submit"><span>Subscribe</span></button>
            </form>
        </div>
    </div>
    <div class="container footer__container">
        <div class="footer-content">
            <div class="footer-content__item">
                <h3 class="footer-list-title">Contacts</h3>
                <ul class="footer-list">
                    <li><a href="mailto:Example.example@mail.com">
                            <span class="icon icon-email"></span>
                            Example.example@mail.com
                        </a></li>
                    <li><a href="tel:+37411111111">
                            <span class="icon icon-phone"></span>
                            +374 11 111111
                        </a></li>
                    <li><span>
                        <span class="icon icon-address"></span>
                        Address, Address/45, Nicaragua
                    </span></li>
                </ul>
            </div>
            <div class="footer-content__item">
                <h3 class="footer-list-title">Apps</h3>
                <ul class="footer-list">
                    <li><a href="https://chrome.google.com/webstore/detail/dropshipall/fpgnjacboogigbfnlemfjfeoefijihhd?utm_source=chrome-ntp-icon">Get extansion</a></li>
                    <li><a href="https://apps.shopify.com/dropshipall?surface_detail=finding-and-adding-products-dropshipping&surface_inter_position=3&surface_intra_position=24&surface_type=category">Get application</a></li>
                    <li><a href="https://www.shopify.com/">Get Shopify</a></li>
                </ul>
            </div>
            <div class="footer-content__item">
                <h3 class="footer-list-title">Let’s talk</h3>
                <ul class="footer-list">
                    <li><a href="#">Write us</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="<?=Url::toRoute('faq/index')?>">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-content__item">
                <h3 class="footer-list-title">Company</h3>
                <ul class="footer-list">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="<?=Url::toRoute('site/privacy')?>">Privacy policy</a></li>
                </ul>
            </div>
            <div class="footer-content__item">
                <h3 class="footer-list-title">We in social</h3>
                <ul class="footer-list">
                    <li><a href="#"><span class="icon icon-fb"></span> Facebook</a></li>
                    <li><a href="#"><span class="icon icon-whatsapp"></span> WhatsApp</a></li>
                    <li><a href="#"><span class="icon icon-youtube"></span> YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="conf-info">
            <p>Copyright ©2019 Dropshipall. All Rights Reserved</p>
        </div>
    </div>
</footer>
