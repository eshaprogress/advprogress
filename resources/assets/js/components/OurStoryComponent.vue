<style lang="scss" scoped>
    .our-story {
        padding: 20px;
    }
    .container {
        max-width: 800px;
        margin:auto;
        .icon {
            text-align: center;
            display: block;
            margin-top: 40px;
            img {
                margin:auto;
            }
        }
    }
    h2 {
        color:var(--blue);
        font-size: 32px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        padding:0;
        text-align: center;
        margin: 0;
    }

    .time-line {
        margin: 5px 45px;
        padding: 10px;

        ul {
            position: relative;
            list-style: none;
            margin: 0;
            padding: 0;
            &::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 0px;
                height: 100%;
            }
            li {
                position: relative;
                width: 100%;
                background-color: rgba(0,0,0,.1);
                border-radius: 10px;
                padding: 10px;
                margin: 50px 35px 70px;
                &:last-child {
                    margin-bottom: 0;
                }
                > span {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -30px;
                    width: 0px;
                    height: 100%;
                    border: 2px solid #aaa;

                    &::before,
                    &::after {
                        content: '';
                        position: absolute;
                        width: 10px;
                        height: 10px;
                        border: 2px solid #aaa;
                        border-radius: 50%;
                        left: -7px;
                        background-color: #333;
                    }

                    &::before {
                        top: -15px;
                    }
                    &::after {
                        top: 100%;
                    }
                }
                .description {
                    font-size: 16px;
                }
                .year {
                    span {
                        position: absolute;
                        font-size: 16px;
                        font-weight: normal;
                        left: -90px;
                        width: 40px;
                        text-align: right;
                        &:first-child {
                            top: -15px;
                        }
                        &:last-child {
                            top: 100%;
                        }
                    }
                }
            }
        }
    }

</style>

<template>
    <section class="section our-story">
        <div class="container">
            <h2>OUR STORY</h2>
            <div class="icon">
                <img src="/images/story-icon.png" alt="Story Icon">
            </div>



            <p>For the past 40 years, plutocrats and right-wing politicians have worked to undermine social services, depress wages, and strip the most vulnerable Americans of their rights. These wealthy interests have captured local and state governments—and most recently, the presidency and the Supreme Court—in order to advance their interests at the expense of the people. </p>

             <p> In response, citizens across the country have gathered at the local, state and national levels to resist this agenda; organizing strikes, public demonstrations, and running for office. </p>

           <p> That’s where we come in. Working hand-in-hand with local activists and community members, we can draft legislation to put your policy agenda into action. </p>

           <p>  Whether it’s combating a housing crisis, reining in local law enforcement, or guaranteeing citizens healthcare and a decent wage, we believe that the best solutions come from progressives working together.  We facilitate conversations between citizens, activists, and community leaders across the country in order to share ideas and coordinate strategies. The legislative tools we offer are the direct result of this collaborative process.  </p>

           <p>    That’s our ethos and our mission: working together to restore power to the people, and ultimately, create a more perfect union. </p>



        </div>
    </section>
</template>

<script>


    export default {
        name:'OurStoryComponent'
    }
</script>
