<template>
    <div class="sidebar--vue" :class="{ 'sidebar--vue__mobile': mobile , 'open': show}"  style="
    --bg-color: #ffffff;
    --secondary-color: #dfdfdf;
    --home-section-color:#e4e9f7;
    --logo-title-color:#fff;
    --icons-color: #363636;
    --items-tooltip-color:#e4e9f7;
    --serach-input-text-color:#5450a9;
    --menu-items-hover-color:#f06a6a;
    --menu-items-text-color: #5450a9;
    --menu-footer-text-color:#fff;">
        <div class="logo-details">

            <i class="bx icon bxl-c-plus-plus"></i>
            <div class="logo_name">
                <a style="font-size:54px; color:#84118b;" class="andes-funes logo-andes" href="/"></a>
                <div class="login row" v-if="!logged">
                    <a href="/login" class="btn btn-sm col btn-outline-primary color-brand">Login </a>
                    <a href="/register" class="btn btn-sm col btn-primary">Registro</a>
                </div>
            </div>
            <i id="btn" class="bx bx-menu" v-on:click="toggle"></i>

        </div>
        <div class="ps" style="height: 87vh;">
            <ul class="nav-list">
                <li>
                    <i class="bx bx-search" v-on:click="toggleTrue"></i>
                    <input type="text" placeholder="Search..." ref="search" v-on:keyup.enter="clickSearch" v-model="querySearch">
                    <span class="tooltip">Search</span>
                </li>
                <span>
                    <li v-for="route in routes">
                        <a :href="route.route">
                            <i class="bx " :class="route.icon"></i>
                            <span class="links_name">{{ route.name }}</span>
                        </a>
                        <span class="tooltip">{{ route.name }}</span>
                    </li>

      </span>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
        <a class="" href="/logout" v-if="auth">
            <div class="profile">
                <i id="log_out" class="bx bx-log-out"></i>
            </div>
            <!--            <div class="profile-details">-->
            <!--                <img src="/vue-sidebar-menu-akahon/img/photo.4e4bdfc3.jpg" alt="profileImg">-->
            <!--                <div class="name_job">-->
            <!--                    <div class="name"> Fayzullo Saidakbarov </div>-->
            <!--                    <div class="job"> Frontend vue developer </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </a>
    </div>

</template>
<script>
export default {
    name: 'menu-lateral',
    props: {
        logged: {
            type: Boolean,
            default: false
        },
    },
    data () {
        return {
            show: true,
            mobile: false,
            routes: [],
            querySearch: '',
            auth: false,
        }
    },
    methods: {
        toggle() {
            this.show = !this.show
        },
        activate() {
            setTimeout(() => this.show = false, 500);
        },
        toggleTrue() {
            this.show = true
            this.$refs.search.focus()
        },
        //getRoutesFromApi the api is located on /api/routes the result must feed the routes var
        async getRoutesFromApi() {
            await axios.get('/api/routes')
                .then(response => {
                    this.routes = response.data.routes
                    this.auth = response.data.auth
                })
                .catch(error => {
                    console.log(error)
                })
        },
        clickSearch() {
            //redirect to serach page with querySearch param using vanilla js
            window.location.href = '/search?query=' + this.querySearch

        }
    },
    beforeMount() {
        this.getRoutesFromApi()
    },
    created() {
        //add hook t check size of screen

        if(screen.width < 512) {
            this.mobile = true
        }

    },
    mounted() {
        this.activate()

    },
    destroyed() {

    }
}
</script>
<style lang="scss">
@import url(https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css);



.menu-logo {
    width: 30px;
    margin: 0 10px 0 10px;
}
.login{
    display: flex;
    height: 48%;
    padding-top: 12px;
    padding-right: 22px;
    width: 87px;
    margin-top: 0;
    a{
        margin: 0;
        padding: 0;
        .btn.btn-sm.col.btn-outline-primary{
            color:rebeccapurple!important;
        }
    }

}
.color-brand{
    color:rebeccapurple!important;
}
.sidebar--vue {
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    min-height: -webkit-min-content;
    min-height: -moz-min-content;
    min-height: min-content;
    width: 60px;
    background: var(--bg-color);
    padding: 6px 6px;
    z-index: 99;
    transition: all .5s ease;
    box-shadow: 0 4px 18px 0px rgb(0 0 0 / 12%), 0 7px 10px -5px rgb(0 0 0 / 15%);
    &__mobile {
        height: 75px;
        &.open{
            height: 100%;
        }
    }

    &.open {
        width: 250px;
        &.links_name {
            display: none!important;
        }
        .sidebar--vue__mobile{
            height: 100%;
        }
    }

    .logo-details {
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;

        .icon {
            opacity: 0;
            transition: all .5s ease;
        }

        .logo_name {
            color: var(--logo-title-color);
            font-size: 20px;
            font-weight: 600;
            //opacity: 0;
            transition: all .5s ease;
            background-color: white;
            height: 76px;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 4px 18px 0px rgb(0 0 0 / 12%), 0 7px 10px -5px rgb(0 0 0 / 15%);
            display:flex;
        }
    }

    &.open .logo-details {
        .icon, .logo_name {
            opacity: 1;
        }
    }

    .logo-details #btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all .4s ease;
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all .5s ease;
    }

    &.open .logo-details #btn {
        text-align: right;
    }

    i {
        color: var(--icons-color);
        height: 60px;
        min-width: 50px;
        font-size: 28px;
        text-align: center;
        line-height: 60px;
    }

    .nav-list {
        margin-top: 20px;
    }

    li {
        position: relative;
        margin: 8px 0;
        list-style: none;

        .tooltip {
            position: absolute;
            top: -20px;
            left: calc(100% + 15px);
            z-index: 3;
            background: var(--items-tooltip-color);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 400;
            opacity: 0;
            white-space: nowrap;
            pointer-events: none;
            transition: 0s;
        }

        &:hover .tooltip {
            opacity: 1;
            pointer-events: auto;
            transition: all .4s ease;
            top: 50%;
            transform: translateY(-50%);
        }
    }

    &.open li {
        &.tooltip{
            display: none;
        }


    }

    input {
        font-size: 15px;
        color: var(--serach-input-text-color);
        font-weight: 400;
        outline: none;
        height: 50px;
        width: 100%;
        width: 50px;
        border: none;
        border-radius: 12px;
        transition: all .5s ease;
        background: var(--secondary-color);
    }

    &.open input {
        padding: 0 20px 0 50px;
        width: 100%;
    }

    .bx-search {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        font-size: 22px;
        background: var(--secondary-color);
        color: var(--icons-color);
        &:focus{
            background-color: red;
            input{
                background-color: red;
                &:focus{
                    background-color: red;
                }
            }
        }
    }

    &.open .bx-search:hover {
        background: var(--secondary-color);
        color: var(--icons-color);
    }

    .bx-search:hover {
        background: var(--menu-items-hover-color);
        color: var(--bg-color);
    }

    li a {
        display: flex;
        height: 100%;
        width: 100%;
        border-radius: 12px;
        align-items: center;
        text-decoration: none;
        transition: all .4s ease;
        background: var(--bg-color);

        &:hover {
            background: var(--menu-items-hover-color);
        }

        .links_name {
            color: var(--menu-items-text-color);
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0;
            display: none;
            pointer-events: none;
            transition: .4s;
        }
    }

    &.open li a .links_name {
        opacity: 1;
        pointer-events: auto;
        display: block;
    }

    li {
        a:hover {
            .links_name, i {
                transition: all .5s ease;
                color: var(--bg-color);
            }
        }

        i {
            height: 50px;
            line-height: 50px;
            font-size: 18px;
            border-radius: 12px;
        }
    }

    div.profile {
        position: fixed;
        height: 30px;
        width: 60px;
        left: 0;
        bottom: 0;
        padding: 15px 14px;
        background: var(--secondary-color);
        transition: all .5s ease;
        overflow: hidden;
    }

    &.open div.profile {
        width: 250px;
    }

    div {
        .profile-details {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        }

        img {
            height: 45px;
            width: 45px;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
        }

        &.profile {
            .job, .name {
                font-size: 15px;
                font-weight: 400;
                color: var(--menu-footer-text-color);
                white-space: nowrap;
            }

            .job {
                font-size: 12px;
            }
        }
    }

    .profile #log_out {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        background: var(--secondary-color);
        width: 100%;
        height: 60px;
        line-height: 60px;
        border-radius: 0;
        transition: all .5s ease;
    }

    &.open .profile {
        #log_out {
            width: 50px;
            background: var(--secondary-color);
            opacity: 0;
        }

        &:hover #log_out {
            opacity: 1;
        }

        #log_out:hover {
            opacity: 1;
            color: red;
        }
    }
}

.home-section {
    position: relative;
    background: var(--home-section-color);
    min-height: 100vh;
    top: 0;
    left: 78px;
    width: calc(100% - 78px);
    transition: all .5s ease;
    z-index: 2;
}

.sidebar--vue.open ~ .home-section {
    left: 250px;
    width: calc(100% - 250px);
}

.home-section .text {
    display: inline-block;
    color: var(--bg-color);
    font-size: 25px;
    font-weight: 500;
    margin: 18px;
}

@media (max-width: 420px) {
    .sidebar--vue{
        li .tooltip{
            display: none;
        }
        .ps{
            display: none;
        }
        &.open .ps{
            display: block;
        }
    }

}

</style>
