<style lang="scss" scoped>
    .footer {
        height: 390px;
        background-image: linear-gradient(to top, #03bf3c, #009de1);
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
                <i class="icon fab fa-twitter"></i>
                <i class="icon fab fa-instagram"></i>
                <i class="icon fab fa-facebook-square"></i>
                <div class="copyright">
                    &copy; 2018 Legislation for Equality Advance Progress. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name:'FooterComponent'
    }
</script>