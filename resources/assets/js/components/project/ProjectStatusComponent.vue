<style lang="scss" scoped>

    article {
        padding:0;
        max-width: 1150px;
        margin: 10px auto;

        h2 {
            font-size: 30px;
            line-height: 30px;
            text-align: center;
            margin: 0;
            border-bottom: solid 2px var(--green);
            padding: 20px 0 20px;
            color: var(--blue);
        }
    }

    .table-header-rotated {
        border-collapse: collapse;
        td {
            width: 30px;
        }
        th {
            padding: 0;

            &.normal {
                position: relative;
                > span {
                    position: absolute;
                    bottom:0;
                    text-indent: 10px;
                }
            }
            &.rotate {
                height: 140px;
                white-space: nowrap;
                position: relative;
                > div {
                    transform: translate(-45px,-80px) rotate(-49deg);
                    position: absolute;
                    bottom: 0;
                    border-bottom: solid 1px black;
                    width: 226px;
                    text-align: left;
                    font-size: 14px;
                    line-height: 22px;
                    left: 45px;
                }
            }
            &.row-header {
                padding: 0 10px;
                border-bottom: 1px solid black;
            }
        }
        td {
            text-align: center;
            line-height: 35px;
            border: 1px solid black;
            padding: 0 10px;
        }
        td, th {
            &.spacer {
                border-top: none;
                border-bottom: none;
                background-color: white;
                padding:0;
            }
        }
    }
    table {
        margin-top: 70px;
        border-spacing: 0;
        border-collapse: collapse;

        tr {
            &.pt-row{
                &:nth-child(odd){
                    background-color: rgba(0,0,0, .1);
                }
            }
            th {
                &:nth-child(1) {
                    width:100px;
                }
                &:nth-child(2) {
                    width:10px;
                }
                &:nth-child(3),
                &:nth-child(4),
                &:nth-child(5),
                &:nth-child(6) {
                    width:50px;
                }
                &:nth-child(7) {
                    width:40px;
                }
                &:nth-child(8) {
                    width:250px;
                    text-align: left;
                }
                &:nth-child(9) {
                    text-align: left;
                    width:700px;
                }
            }
            td {
                &:nth-child(1) {
                    font-weight: bold;
                    white-space: nowrap;
                    text-align: right;
                }
                &:nth-child(8) {
                    text-align: left;
                }
                &:nth-child(9) {
                    text-align: left;
                }
            }
        }
    }

    .enabled {
        color:var(--red);
    }
    .disabled {
        color:var(--gray);
    }

</style>

<template>
    <article class="card">
        <template v-if="isProjectLoading">
            <loader>
                Loading ....
            </loader>
        </template>
        <template v-else>
            <h2>Current Status</h2>
            <div v-html="getProject.current_status_description"></div>
            <table class="table table-header-rotated">
                <tr>
                    <!-- First column header is not rotated -->
                    <th></th>
                    <th class="spacer"></th>
                    <!-- Following headers are rotated -->
                    <th class="rotate"><div><span>Constitutional Amendment</span></div></th>
                    <th class="rotate"><div><span>Statute</span></div></th>
                    <th class="rotate"><div><span>Case Law</span></div></th>
                    <th class="rotate"><div><span>Executive Order</span></div></th>
                    <th class="spacer"></th>
                    <th class="normal"><span>Source Of Law</span></th>
                    <th class="normal"><span>Citation Source</span></th>
                </tr>
                <template v-for="pt in getProject.matrix">
                    <tr :id="pt.state_abbr.toLowerCase()" class="pt-row" :title="pt.state_abbr">
                        <td>{{pt.state}}</td>
                        <td class="spacer"></td>
                        <td><i class="fa fa-check" :class="enableDisableClasses(pt.because_constitutional_amendment)"></i></td>
                        <td><i class="fa fa-check" :class="enableDisableClasses(pt.because_statute)"></i></td>
                        <td><i class="fa fa-check" :class="enableDisableClasses(pt.because_case_law)"></i></td>
                        <td><i class="fa fa-check" :class="enableDisableClasses(pt.because_executive_order)"></i></td>
                        <th class="spacer"></th>
                        <td>{{pt.source_of_law}}</td>
                        <td>{{pt.citation_source}}</td>
                    </tr>
                </template>
            </table>
        </template>
    </article>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name:'ProjectsIntroComponent',
        methods:{
            isChecked(value)
            {
                return (value);
            },
            enableDisableClasses(field)
            {
                return {
                    enabled:this.isChecked(field),
                    disabled:!this.isChecked(field)
                };
            }
        },
        computed:{
            ...mapGetters([
                'getProject',
                'isProjectLoading',
            ])
        }
    }
</script>
