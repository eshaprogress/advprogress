<style lang="scss" scoped>
    .footer {
        background-image: linear-gradient(to top, #03bf3c, #009de1);
        position: relative;
        color:var(--white);
        padding: 20px;

        .bird-footer {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 390px;
            height: 220px;
            overflow: hidden;
            background: url(/images/bird_footer.svg) no-repeat;
            background-size: 400px;
            color:var(--white);
        }
        .share-icons {
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
                margin-top: 20px;
                font-size: 12px;
                font-weight: normal;
                font-style: normal;
                font-stretch: normal;
                line-height: normal;
                letter-spacing: normal;
                text-transform: uppercase;
            }
        }
        .link-list {
            margin: auto;
            width: 50%;
            text-align: center;

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
                    left: 0;
                    right:0;
                    display: block;
                }
            }
            &.site-map {

            }
            &.contact-us {

            }

            ul {
                list-style: none;
                padding: 0;
                margin:0;
                margin-top: 20px;
                li {
                    list-style: none;
                    padding:0;
                    margin: 0 0 20px;
                }
            }
        }
    }
</style>

<template>
    <footer class="footer">

        <div class="link-list">
            <h4>CONTACT US<span class="line"></span></h4>
            <ul>
                <li><a href="">Email</a></li>
                <li><a href="#">Phone</a></li>
                <li><a href="#">Volunteer</a></li>
            </ul>
        </div>
        <div class="share-icons">
            <h4>JOIN THE CONVERSATION</h4>
            <a class="icon" href="#"><i class="fab fa-twitter"></i></a>
            <a class="icon" href="#"><i class="fab fa-instagram"></i></a>
            <a class="icon" href="#"><i class="fab fa-facebook-square"></i></a>
            <div class="copyright">
                &copy; 2018 Legislation for Equality Advance Progress. All Rights Reserved.
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name:'FooterMobileComponent'
    }
</script>