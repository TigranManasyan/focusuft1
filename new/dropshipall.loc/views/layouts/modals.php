<?php

use yii\helpers\Url;

?>
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
            <div class='sign-in-input-new'>
                <input type="text" class="form-element" placeholder="Surname">
                <span class="sign-in-url">.myshopify.com</span>
            </div>

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
                <form class="inputs-form" action="<?=Url::toRoute('site/contact')?>" method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

                    <span>name</span>
                    <div class="form-group">
                        <label class="name-inputs-blo">
                            <input type="text" class="form-element" placeholder="Name" name="name">
                            <span class="form-label__error">Wrong  Name</span>
                        </label>
                        <label>
                            <input type="text" class="form-element" placeholder="Surname" name="surname">
                            <span class="form-label__error">Wrong  mail</span>
                        </label>
                    </div>
                    <span>mail</span>
                    <div class="form-group">
                        <label class="name-inputs-blo">
                            <input type="text" class="form-element" placeholder="Email" name="email">
                            <span class="form-label__error">Wrong  Email</span>
                        </label>
                        <label>
                            <input type="text" class="form-element" placeholder="Subject" name="subject">
                            <span class="form-label__error">Wrong  Subject</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <textarea placeholder="Write here…" class="form-element" cols="30" rows="10" name="text"></textarea>
                        </label>
                    </div>
                    <div class="form-button-block d-flex">
                        <button class="btn btn-additionally"><span>Send</span></button>
                    </div>
                </form>

            </div>
            <div class="info-block">
                <div class="footer-info-contact-block lin">
                    <h3 class="info-block-title">Contacts</h3>
                    <p class="info-block__subtitle">Use call or email for contact us.</p>
                    <div class="d-flex align-center"><span class="icon icon-email"></span>
                        <p>Example.example@mail.com</p></div>
                    <div class="d-flex align-center"><span class="icon icon-phone"></span>
                        <p>5624561784652387645928</p></div>
                    <div class="d-flex align-center"><span class="icon icon-address"></span>
                        <p>Address, Address/45, Nicaragua</p></div>
                </div>
                <div class="footer-info-contact-block">
                    <h3 class="info-block-title">Follow us</h3>
                    <p class="info-block__subtitle">Let’s talk in social.</p>
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

