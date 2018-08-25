<style lang="scss" scoped>
    .footer {
        background-image: linear-gradient(to top, #03bf3c, #009de1);
        position: relative;

        .disclaimer {
            color: var(--white);
            max-width: 500px;
            padding: 20px;
            margin: 50px auto auto;
            background-color: rgba(255, 255, 255, 0.1);
            border: solid 1px rgba(0, 0, 0, 0.1);
            strong {
                font-size: 20px;
                margin: 0;
                padding: 10px;
                display: block;
                text-align: center;
                padding-top: 0;
            }
            p {
                font-size: 12px;
                margin:0;
                padding:0;
                display: block;
            }
        }
        .bird-footer {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 390px;
            height: 220px;
            overflow: hidden;
            background: url(/images/bird_footer.svg) no-repeat;
            background-size: 400px;
        }
        .footer-container {
            color:var(--white);
            max-width: 1150px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin:auto;

            .share-icons {
                padding-top: 225px;
                width: 600px;
                text-align: center;
                h4 {
                    font-size: 18px;
                    font-weight: 600;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    padding:0;
                    margin: 0 0 20px;
                }
                .icon {
                    font-size: 32px;
                    font-weight: normal;
                    color:var(--white);
                    margin: 0 20px;
                }
                .copyright {
                    margin-top: 50px;
                    font-size: 12px;
                    font-weight: normal;
                    font-style: normal;
                    font-stretch: normal;
                    line-height: normal;
                    letter-spacing: normal;
                    text-transform: uppercase;
                }
            }
            .link-list-container {
                display: grid;
                grid-template-columns: repeat(2, auto);
                grid-template-rows: auto;
                position: absolute;
                width: 550px;
                top: 50px;
                left: 144px;
                z-index: 100;
                .link-list {
                    a {
                        color:var(--white);
                        text-decoration: none;
                        font-size: 16px;
                        font-weight: normal;
                    }

                    h4 {
                        font-size: 18px;
                        font-weight: normal;
                        margin:0;
                        padding:0;
                        position: relative;

                        .line {
                            height: 2px;
                            background-color: var(--white);
                            position: absolute;
                            bottom: -7px;
                            left: 12px;
                            display: block;
                            width: 188px;
                        }
                    }
                    &.site-map {

                    }
                    &.contact-us {

                    }

                    ul {
                        list-style: none;
                        padding: 0;
                        margin: 20px 0 0 20px;
                        li {
                            list-style: none;
                            padding:0;
                            margin: 0 0 20px;
                        }
                    }
                }
            }
        }
    }
</style>

<template>
    <footer class="footer">
        <div class="footer-container">
            <div class="link-list-container">
                <div class="link-list site-map">
                    <h4>SITE MAP <span class="line"></span></h4>
                    <ul>
                        <li>
                            <router-link to="/our-story">Our Story</router-link>
                        </li>
                        <li>
                            <router-link to="/the-team">The Team</router-link>
                        </li>
                        <li>
                            <router-link to="/join-us">Join Us</router-link>
                        </li>
                        <li>
                            <router-link to="/donate">Donations</router-link>
                        </li>
                        <li>
                            <router-link to="/cancel-subscription">Cancel Subscription</router-link>
                        </li>
                    </ul>
                </div>
                <div class="link-list contact-us">
                    <h4>CONTACT US<span class="line"></span></h4>
                    <ul>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Phone</a></li>
                        <li><a href="#">Volunteer</a></li>
                    </ul>
                </div>
            </div>
            <div class="share-icons">
                <h4>JOIN THE CONVERSATION</h4>
                <a class="icon" href="http://www.twitter.com/advprogress"><i class="fab fa-twitter"></i></a>
                <a class="icon" href="http://www.facebook.com/advanceprogresss/"><i class="fab fa-facebook-square"></i></a>
                <div class="copyright">
                    &copy; 2018 Legislation for Equality Advance Progress. All Rights Reserved.
                </div>
            </div>
        </div>
        <div class="bird-footer"></div>
        <div class="disclaimer">
            <strong>DISCLAIMER</strong>
            <p>The content provided by LEAP or its representatives is not intended as legal advice or guidance, and you may not rely upon it in that manner.
                Communications between you and representatives of LEAP are protected by our Privacy Policy but not by the attorney-client privilege or as work product.
                LEAP is not a law firm or a substitute for an attorney or law firm. We cannot provide advice, explanation, opinion, or recommendation about possible legal rights, remedies, defenses, options, selection of forms, or strategies.
                You should retain and consult an attorney regarding your rights and obligations.  Your access to this website and its content are subject to our Terms of Use.</p>
        </div>
    </footer>
</template>

<script>
    export default {
        name:'FooterComponent'
    }
</script>