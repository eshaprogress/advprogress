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

        .disclaimer {
            color: var(--white);
            padding: 0;
            margin: auto;
            p {
                padding:0;
                display: block;

                font-size: 14px;
                font-weight: normal;
                font-style: normal;
                font-stretch: normal;
                line-height: normal;
                letter-spacing: normal;
                color: var(--white);
                margin: 30px 0 0;
            }
        }

        .copyright {
            max-width: 750px;
            margin:auto;
            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: var(--white);
            text-align: center;
            padding: 50px;
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

        .link-list {
            margin: auto;

            a {
                color:var(--white);
                text-decoration: none;
                font-size: 16px;
                font-weight: normal;
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
                <li><router-link :to="{name:'volunteer'}">Volunteer</router-link></li>
            </ul>
            <h4>CONNECT<span class="line"></span></h4>
            <ul>
                <li><a title="Twitter Feed" target="_blank" href="http://www.twitter.com/advprogress">Twitter</a></li>
                <li><a title="Facebook Page" target="_blank" href="http://www.facebook.com/advanceprogresss/">Facebook</a></li>
            </ul>
        </div>
        <div class="disclaimer">
            <h4>DISCLAIMER<span class="line"></span></h4>
            <p>The content provided by LEAP or its representatives is not intended as legal advice or guidance, and you may not rely upon it in that manner.
                Communications between you and representatives of LEAP are protected by our Privacy Policy but not by the attorney-client privilege or as work product.
                LEAP is not a law firm or a substitute for an attorney or law firm. We cannot provide advice, explanation, opinion, or recommendation about possible legal rights, remedies, defenses, options, selection of forms, or strategies.
                You should retain and consult an attorney regarding your rights and obligations.  Your access to this website and its content are subject to our Terms of Use.</p>
        </div>
        <div class="copyright">
            &copy; 2018 Legislation for Equality Advance Progress. All Rights Reserved.
        </div>
    </footer>
</template>

<script>
    export default {
        name:'FooterMobileComponent'
    }
</script>