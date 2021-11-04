<template>
    <div class="title-container">
        <div class="title">
            <div class="title-top">
                <div class="title-cover">
                    <span>
                        <div class="title-cover-image"
                             :style="{ backgroundImage: `url(${thumbnail})` }"></div>
                    </span>
                </div>
                <div class="title-options">
                    <div class="title-options-option" v-on:click="favoriteToggle" :class="{ 'title-options-option-favorite': favorite }">
                        <svg class="icon">
                            <use xlink:href="#icon-heart-o"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="title-content">
                <div class="progress__top">
                    <div class="album-info">
                        <div class="album-info__name">{{registro.title}}
                        </div>
                        <div class="album-info__track" v-for="author in registro.authors">{{ author.given }} {{ author.family }}</div>
                        <p
                            class="abstract"
                            v-on:click="toggleText"
                            :class="{ 'abstract-active': abstractActive }"
                        >{{registro.abstract}}</p>
                    </div>
                </div>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" hidden xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <symbol id="icon-heart-o" viewBox="0 0 32 32">
                    <title>icon-heart-o</title>
                    <path
                        d="M22.88 1.952c-2.72 0-5.184 1.28-6.88 3.456-1.696-2.176-4.16-3.456-6.88-3.456-4.48 0-9.024 3.648-9.024 10.592 0 7.232 7.776 12.704 15.072 17.248 0.256 0.16 0.544 0.256 0.832 0.256s0.576-0.096 0.832-0.256c7.296-4.544 15.072-10.016 15.072-17.248 0-6.944-4.544-10.592-9.024-10.592zM16 26.56c-4.864-3.072-12.736-8.288-12.736-14.016 0-5.088 3.040-7.424 5.824-7.424 2.368 0 4.384 1.504 5.408 4.032 0.256 0.608 0.832 0.992 1.472 0.992s1.248-0.384 1.472-0.992c1.024-2.528 3.040-4.032 5.408-4.032 2.816 0 5.824 2.304 5.824 7.424 0.064 5.728-7.808 10.976-12.672 14.016z"></path>
                    <path
                        d="M16 30.144c-0.32 0-0.64-0.096-0.896-0.256-7.296-4.576-15.104-10.048-15.104-17.344 0-7.008 4.576-10.688 9.12-10.688 2.656 0 5.152 1.216 6.88 3.392 1.728-2.144 4.224-3.392 6.88-3.392 4.544 0 9.12 3.68 9.12 10.688 0 7.296-7.808 12.768-15.104 17.344-0.256 0.16-0.576 0.256-0.896 0.256zM9.12 2.048c-4.448 0-8.928 3.616-8.928 10.496 0 7.168 7.744 12.64 15.008 17.152 0.48 0.288 1.12 0.288 1.568 0 7.264-4.544 15.008-9.984 15.008-17.152 0-6.88-4.48-10.496-8.928-10.496-2.656 0-5.088 1.216-6.816 3.392l-0.032 0.128-0.064-0.096c-1.696-2.176-4.192-3.424-6.816-3.424zM16 26.688l-0.064-0.032c-3.808-2.4-12.768-8.032-12.768-14.112 0-5.152 3.072-7.52 5.952-7.52 2.432 0 4.48 1.536 5.504 4.096 0.224 0.576 0.768 0.928 1.376 0.928s1.152-0.384 1.376-0.928c1.024-2.56 3.072-4.096 5.504-4.096 2.848 0 5.952 2.336 5.952 7.52 0 6.080-8.96 11.712-12.768 14.112l-0.064 0.032zM9.12 5.248c-2.752 0-5.728 2.304-5.728 7.328 0 5.952 8.8 11.488 12.608 13.92 3.808-2.4 12.608-7.968 12.608-13.92 0-5.024-2.976-7.328-5.728-7.328-2.336 0-4.32 1.472-5.312 3.968-0.256 0.64-0.864 1.056-1.568 1.056s-1.312-0.416-1.568-1.056c-0.992-2.496-2.976-3.968-5.312-3.968z"></path>
                    <path
                        d="M6.816 20.704c0.384 0.288 0.512 0.704 0.48 1.12 0.224 0.256 0.384 0.608 0.384 0.96 0 0.032 0 0.032 0 0.064 0.16 0.128 0.32 0.256 0.48 0.384 0.128 0.064 0.256 0.16 0.384 0.256 0.096 0.064 0.192 0.16 0.256 0.224 0.8 0.576 1.632 1.12 2.496 1.664 0.416 0.128 0.8 0.256 1.056 0.32 1.984 0.576 4.064 0.8 6.112 0.928 2.688-1.92 5.312-3.904 8-5.792 0.896-1.088 1.92-2.080 2.912-3.104v-7.552c-0.096-0.128-0.192-0.288-0.32-0.416-0.768-1.024-1.184-2.176-1.6-3.296-0.768-0.416-1.536-0.8-2.336-1.12-0.128-0.064-0.256-0.096-0.384-0.16h-21.568v12.992c1.312 0.672 2.496 1.6 3.648 2.528z"></path>
                </symbol>
                <symbol id="icon-heart" viewBox="0 0 32 32">
                    <title>icon-heart</title>
                    <path
                        d="M22.88 1.952c-2.72 0-5.184 1.28-6.88 3.456-1.696-2.176-4.16-3.456-6.88-3.456-4.48 0-9.024 3.648-9.024 10.592 0 7.232 7.776 12.704 15.072 17.248 0.256 0.16 0.544 0.256 0.832 0.256s0.576-0.096 0.832-0.256c7.296-4.544 15.072-10.016 15.072-17.248 0-6.944-4.544-10.592-9.024-10.592zM16 26.56c-4.864-3.072-12.736-8.288-12.736-14.016 0-5.088 3.040-7.424 5.824-7.424 2.368 0 4.384 1.504 5.408 4.032 0.256 0.608 0.832 0.992 1.472 0.992s1.248-0.384 1.472-0.992c1.024-2.528 3.040-4.032 5.408-4.032 2.816 0 5.824 2.304 5.824 7.424 0.064 5.728-7.808 10.976-12.672 14.016z"></path>
                    <path
                        d="M16 30.144c-0.32 0-0.64-0.096-0.896-0.256-7.296-4.576-15.104-10.048-15.104-17.344 0-7.008 4.576-10.688 9.12-10.688 2.656 0 5.152 1.216 6.88 3.392 1.728-2.144 4.224-3.392 6.88-3.392 4.544 0 9.12 3.68 9.12 10.688 0 7.296-7.808 12.768-15.104 17.344-0.256 0.16-0.576 0.256-0.896 0.256zM9.12 2.048c-4.448 0-8.928 3.616-8.928 10.496 0 7.168 7.744 12.64 15.008 17.152 0.48 0.288 1.12 0.288 1.568 0 7.264-4.544 15.008-9.984 15.008-17.152 0-6.88-4.48-10.496-8.928-10.496-2.656 0-5.088 1.216-6.816 3.392l-0.032 0.128-0.064-0.096c-1.696-2.176-4.192-3.424-6.816-3.424zM16 26.688l-0.064-0.032c-3.808-2.4-12.768-8.032-12.768-14.112 0-5.152 3.072-7.52 5.952-7.52 2.432 0 4.48 1.536 5.504 4.096 0.224 0.576 0.768 0.928 1.376 0.928s1.152-0.384 1.376-0.928c1.024-2.56 3.072-4.096 5.504-4.096 2.848 0 5.952 2.336 5.952 7.52 0 6.080-8.96 11.712-12.768 14.112l-0.064 0.032zM9.12 5.248c-2.752 0-5.728 2.304-5.728 7.328 0 5.952 8.8 11.488 12.608 13.92 3.808-2.4 12.608-7.968 12.608-13.92 0-5.024-2.976-7.328-5.728-7.328-2.336 0-4.32 1.472-5.312 3.968-0.256 0.64-0.864 1.056-1.568 1.056s-1.312-0.416-1.568-1.056c-0.992-2.496-2.976-3.968-5.312-3.968z"></path>
                </symbol>
                <symbol id="icon-link" viewBox="0 0 32 32">
                    <title>link</title>
                    <path
                        d="M23.584 17.92c0 0.864 0 1.728 0 2.56 0 1.312 0 2.656 0 3.968 0 0.352 0.032 0.736-0.032 1.12 0.032-0.16 0.032-0.288 0.064-0.448-0.032 0.224-0.096 0.448-0.16 0.64 0.064-0.128 0.128-0.256 0.16-0.416-0.096 0.192-0.192 0.384-0.32 0.576 0.096-0.128 0.16-0.224 0.256-0.352-0.128 0.16-0.288 0.32-0.48 0.48 0.128-0.096 0.224-0.16 0.352-0.256-0.192 0.128-0.352 0.256-0.576 0.32 0.128-0.064 0.256-0.128 0.416-0.16-0.224 0.096-0.416 0.16-0.64 0.16 0.16-0.032 0.288-0.032 0.448-0.064-0.256 0.032-0.512 0.032-0.768 0.032-0.448 0-0.896 0-1.312 0-1.472 0-2.976 0-4.448 0-1.824 0-3.616 0-5.44 0-1.568 0-3.104 0-4.672 0-0.736 0-1.44 0-2.176 0-0.128 0-0.224 0-0.352-0.032 0.16 0.032 0.288 0.032 0.448 0.064-0.224-0.032-0.448-0.096-0.64-0.16 0.128 0.064 0.256 0.128 0.416 0.16-0.192-0.096-0.384-0.192-0.576-0.32 0.128 0.096 0.224 0.16 0.352 0.256-0.16-0.128-0.32-0.288-0.48-0.48 0.096 0.128 0.16 0.224 0.256 0.352-0.128-0.192-0.256-0.352-0.32-0.576 0.064 0.128 0.128 0.256 0.16 0.416-0.096-0.224-0.16-0.416-0.16-0.64 0.032 0.16 0.032 0.288 0.064 0.448-0.032-0.256-0.032-0.512-0.032-0.768 0-0.448 0-0.896 0-1.312 0-1.472 0-2.976 0-4.448 0-1.824 0-3.616 0-5.44 0-1.568 0-3.104 0-4.672 0-0.736 0-1.44 0-2.176 0-0.128 0-0.224 0.032-0.352-0.032 0.16-0.032 0.288-0.064 0.448 0.032-0.224 0.096-0.448 0.16-0.64-0.064 0.128-0.128 0.256-0.16 0.416 0.096-0.192 0.192-0.384 0.32-0.576-0.096 0.128-0.16 0.224-0.256 0.352 0.128-0.16 0.288-0.32 0.48-0.48-0.128 0.096-0.224 0.16-0.352 0.256 0.192-0.128 0.352-0.256 0.576-0.32-0.128 0.064-0.256 0.128-0.416 0.16 0.224-0.096 0.416-0.16 0.64-0.16-0.16 0.032-0.288 0.032-0.448 0.064 0.48-0.064 0.96-0.032 1.44-0.032 0.992 0 1.952 0 2.944 0 1.216 0 2.432 0 3.616 0 1.056 0 2.112 0 3.168 0 0.512 0 1.024 0 1.536 0 0 0 0 0 0.032 0 0.448 0 0.896-0.192 1.184-0.48s0.512-0.768 0.48-1.184c-0.032-0.448-0.16-0.896-0.48-1.184s-0.736-0.48-1.184-0.48c-0.64 0-1.28 0-1.92 0-1.408 0-2.816 0-4.224 0-1.44 0-2.848 0-4.256 0-0.672 0-1.344 0-2.016 0-0.736 0-1.472 0.192-2.112 0.576s-1.216 0.96-1.568 1.6c-0.384 0.64-0.544 1.376-0.544 2.144 0 0.672 0 1.376 0 2.048 0 1.28 0 2.56 0 3.84 0 1.504 0 3.040 0 4.544 0 1.408 0 2.848 0 4.256 0 0.992 0 1.952 0 2.944 0 0.224 0 0.448 0 0.64 0 0.864 0.224 1.76 0.768 2.464 0.16 0.192 0.288 0.384 0.48 0.576s0.384 0.352 0.608 0.512c0.32 0.224 0.64 0.384 1.024 0.512 0.448 0.16 0.928 0.224 1.408 0.224 0.16 0 0.32 0 0.48 0 0.896 0 1.792 0 2.72 0 1.376 0 2.784 0 4.16 0 1.536 0 3.040 0 4.576 0 1.312 0 2.656 0 3.968 0 0.768 0 1.536 0 2.336 0 0.416 0 0.832-0.032 1.248-0.128 1.504-0.32 2.784-1.6 3.104-3.104 0.128-0.544 0.128-1.056 0.128-1.568 0-0.608 0-1.184 0-1.792 0-1.408 0-2.816 0-4.224 0-0.256 0-0.512 0-0.768 0-0.448-0.192-0.896-0.48-1.184s-0.768-0.512-1.184-0.48c-0.448 0.032-0.896 0.16-1.184 0.48-0.384 0.384-0.576 0.768-0.576 1.248v0z"></path>
                    <path
                        d="M32 11.232c0-0.8 0-1.568 0-2.368 0-1.248 0-2.528 0-3.776 0-0.288 0-0.576 0-0.864 0-0.896-0.768-1.696-1.696-1.696-0.8 0-1.568 0-2.368 0-1.248 0-2.528 0-3.776 0-0.288 0-0.576 0-0.864 0-0.448 0-0.896 0.192-1.184 0.48s-0.512 0.768-0.48 1.184c0.032 0.448 0.16 0.896 0.48 1.184s0.736 0.48 1.184 0.48c0.8 0 1.568 0 2.368 0 1.248 0 2.528 0 3.776 0 0.288 0 0.576 0 0.864 0-0.576-0.576-1.12-1.12-1.696-1.696 0 0.8 0 1.568 0 2.368 0 1.248 0 2.528 0 3.776 0 0.288 0 0.576 0 0.864 0 0.448 0.192 0.896 0.48 1.184s0.768 0.512 1.184 0.48c0.448-0.032 0.896-0.16 1.184-0.48 0.352-0.256 0.544-0.64 0.544-1.12v0z"></path>
                    <path
                        d="M15.040 21.888c0.16-0.16 0.288-0.288 0.448-0.448 0.384-0.384 0.8-0.8 1.184-1.184 0.608-0.608 1.184-1.184 1.792-1.792 0.704-0.704 1.44-1.44 2.176-2.176 0.8-0.8 1.568-1.568 2.368-2.368s1.6-1.6 2.4-2.4c0.736-0.736 1.504-1.504 2.24-2.24 0.64-0.64 1.248-1.248 1.888-1.888 0.448-0.448 0.896-0.896 1.344-1.344 0.224-0.224 0.448-0.416 0.64-0.64 0 0 0.032-0.032 0.032-0.032 0.32-0.32 0.48-0.768 0.48-1.184s-0.192-0.896-0.48-1.184c-0.32-0.288-0.736-0.512-1.184-0.48-0.512 0.032-0.928 0.16-1.248 0.48-0.16 0.16-0.288 0.288-0.448 0.448-0.384 0.384-0.8 0.8-1.184 1.184-0.608 0.608-1.184 1.184-1.792 1.792-0.704 0.704-1.44 1.44-2.176 2.176-0.8 0.8-1.568 1.568-2.368 2.368s-1.6 1.6-2.4 2.4c-0.736 0.736-1.504 1.504-2.24 2.24-0.64 0.64-1.248 1.248-1.888 1.888-0.448 0.448-0.896 0.896-1.344 1.344-0.224 0.224-0.448 0.416-0.64 0.64 0 0-0.032 0.032-0.032 0.032-0.32 0.32-0.48 0.768-0.48 1.184s0.192 0.896 0.48 1.184c0.32 0.288 0.736 0.512 1.184 0.48 0.48 0 0.928-0.16 1.248-0.48v0z"></path>
                </symbol>
            </defs>
        </svg>
    </div>
</template>
<script>

export default {
    name: "registro-title",
    props: [
        'registro',
        'img_url'
    ],
    mounted() {
        this.loadThumbnail();
        if(this.registro.validate_auth_user_attached.length >0){
            this.favorite = true;
        }
    },
    components: {},
    data() {
        return {
            abstractActive: false,
            favorite: false,
            thumbnail: [],
        }
    },
    methods: {
        toggleText: function(){
            this.abstractActive = !this.abstractActive;
        },
        async favoriteToggle(){
            this.favorite = !this.favorite;
            await axios.put(`/registro-attach/${this.registro.eprintid}`)
                        .then(response => {
                            console.log(response.data.attached);
                            this.favorite = response.data.attached;
                        })
                        .catch(function(error) {
                            if (error.response && error.response.status === 401) {
                                window.location.href = "login";
                            } else {
                                // Handle error however you want
                            }
                        });
        },
        loadThumbnail(){
            console.log("loadThumbnail");
            console.log(this.registro.documents);
            this.thumbnail = 'https://funes-laravel.test/images/screen.png';
            if(this.registro.documents.length > 0){
                this.thumbnail = this.registro.documents[0].thumbnail;
            }
        }
    }
}
</script>
<style lang="scss" ref="registroTitle">

.icon {
    display: inline-block;
    width: 1em;
    height: 1em;
    stroke-width: 0;
    stroke: currentColor;
    fill: currentColor;
}
.abstract{
    height: 250px;
    overflow: hidden;
    cursor: pointer;
    &-active{
        height: 100%;
    }
    &::after{
        content: 'Ver más';
        width: 100%;
        z-index: 1;
        position: relative;
        color: red;
        display: block;
    }
}

.title-container {
    width: 100%;
    display: flex;
    justify-content: right;
    margin-top: 30px;
    align-items: flex-start;
    height: 100vh;
    @media screen and (max-width: 700px), (max-height: 500px) {
        flex-wrap: wrap;
        flex-direction: column;
    }
}

.title {
    background: white;
    width: 410px;
    min-height: 480px;
    // box-shadow: 0px 55px 75px -10px rgba(76, 70, 124, 0.5);
    // box-shadow: 0px 55px 105px 10px rgba(76, 70, 124, 0.35);
    box-shadow: 0px 15px 35px -5px rgba(50, 88, 130, 0.32);
    border-radius: 15px;
    padding: 30px;
    //@media screen and (max-width: 576px), (max-height: 500px) {
    //    width: 95%;
    //    padding: 20px;
    //    margin-top: 75px;
    //    min-height: initial;
    //    padding-bottom: 30px;
    //    max-width: 400px;
    //}
    &-top {
        display: flex;
        align-items: flex-start;
        position: relative;
        z-index: 4;
        @media screen and (max-width: 576px), (max-height: 500px) {
            flex-wrap: wrap;
        }
    }

    &-cover {
        width: 300px;
        height: 300px;
        margin-left: -70px;
        flex-shrink: 0;
        position: relative;
        z-index: 2;
        border-radius: 15px;
        // transform: perspective(512px) translate3d(0, 0, 0);
        // transition: all .4s cubic-bezier(.125, .625, .125, .875);
        z-index: 1;

        //@media screen and (max-width: 576px), (max-height: 500px) {
        //    margin-top: -70px;
        //    margin-bottom: 25px;
        //    width: 290px;
        //    height: 230px;
        //    margin-left: auto;
        //    margin-right: auto;
        //}

        &-image {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            position: absolute;
            left: 0;
            top: 0;

            &:before {
                content: "";
                background: inherit;
                width: 100%;
                height: 100%;
                box-shadow: 0px 10px 40px 0px rgba(76, 70, 124, 0.5);
                display: block;
                z-index: 1;
                position: absolute;
                top: 30px;
                transform: scale(0.9);
                filter: blur(10px);
                opacity: 0.9;
                border-radius: 15px;
            }

            &:after {
                content: "";
                background: inherit;
                width: 100%;
                height: 100%;
                box-shadow: 0px 10px 40px 0px rgba(76, 70, 124, 0.5);
                display: block;
                z-index: 2;
                position: absolute;
                border-radius: 15px;
            }
        }

        &__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0px 10px 40px 0px rgba(76, 70, 124, 0.5);
            user-select: none;
            pointer-events: none;
        }
    }

    &-options {
        flex: 1;
        padding-left: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-center;

        //@media screen and (max-width: 576px), (max-height: 500px) {
        //    flex-direction: row;
        //    padding-left: 0;
        //    width: 100%;
        //    flex: unset;
        //}

        &-option {
            display: inline-flex;
            font-size: 30px;
            padding: 5px;
            margin-bottom: 10px;
            color: #acb8cc;
            cursor: pointer;
            width: 50px;
            height: 50px;
            align-items: flex-center;
            justify-content: center;
            position: relative;
            transition: all 0.3s ease-in-out;

            @media screen and (max-width: 576px), (max-height: 500px) {
                font-size: 26px;
                padding: 5px;
                margin-right: 10px;
                color: #acb8cc;
                cursor: pointer;
                width: 40px;
                height: 40px;
                margin-bottom: 0;
            }

            &::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background: #fff;
                transform: scale(0.5);
                opacity: 0;
                box-shadow: 0px 5px 10px 0px rgba(76, 70, 124, 0.2);
                transition: all 0.3s ease-in-out;
                transition: all 0.4s cubic-bezier(0.35, 0.57, 0.13, 0.88);
            }

            //@media screen and (min-width: 500px) {
                &:hover {
                    color: #d71919;

                    &::before {
                        opacity: 1;
                        transform: scale(1.3);
                    }
                }
            //}
            //
            //@media screen and (max-width: 576px), (max-height: 500px) {
                &-favorite {
                    color: #d71919;

                    &::before {
                        opacity: 1;
                        transform: scale(1.3);
                    }
                }
            //}

            .icon {
                position: absolute;
                top: 67%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            &.-xl {
                margin-bottom: 0;
                font-size: 95px;
                // filter: drop-shadow(0 2px 8px rgba(172, 184, 204, 0.3));
                // filter: drop-shadow(0 9px 6px rgba(172, 184, 204, 0.35));
                filter: drop-shadow(0 11px 6px rgba(172, 184, 204, 0.45));
                color: #fff;
                width: auto;
                height: auto;
                display: inline-flex;
                @media screen and (max-width: 576px), (max-height: 500px) {
                    margin-left: auto;
                    font-size: 75px;
                    margin-right: 0;
                }

                &:before {
                    display: none;
                }
            }

            &.-favorite {
                &.active {
                    color: red;
                }
            }
        }
    }
}

[v-cloak] {
    display: none;
}

[v-cloak] > * {
    display: none;
}

.title-content {
    width: 100%;
    margin-top: 25px;
    user-select: none;

    &__top {
        //display: flex;
        //align-items: flex-end;
        //justify-content: space-between;
    }
    p {
        text-align: justify;
        text-justify: inter-word;
    }
}


.album-info {
    color: #71829e;
    flex: 1;
    padding-right: 60px;
    user-select: none;

    @media screen and (max-width: 576px), (max-height: 500px) {
        padding-right: 30px;
    }

    &__name {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 12px;
        line-height: 1.3em;
        @media screen and (max-width: 576px), (max-height: 500px) {
            font-size: 18px;
            margin-bottom: 9px;
        }
    }

    &__track {
        font-weight: 400;
        font-size: 20px;
        opacity: 0.7;
        line-height: 1.3em;
        min-height: 52px;
        @media screen and (max-width: 576px), (max-height: 500px) {
            font-size: 18px;
            min-height: 50px;
        }
    }
}

.github-btn {
    position: absolute;
    right: 40px;
    bottom: 50px;
    text-decoration: none;
    padding: 15px 25px;
    border-radius: 4px;
    box-shadow: 0px 4px 30px -6px rgba(36, 52, 70, 0.65);
    background: #24292e;
    color: #fff;
    font-weight: bold;
    letter-spacing: 1px;
    font-size: 16px;
    transition: all .3s ease-in-out;

    @media screen and (min-width: 500px) {
        &:hover {
            transform: scale(1.1);
            box-shadow: 0px 17px 20px -6px rgba(36, 52, 70, 0.36);
        }
    }

    @media screen and (max-width: 700px) {
        position: relative;
        bottom: auto;
        right: auto;
        margin-top: 20px;

        &:active {
            transform: scale(1.1);
            box-shadow: 0px 17px 20px -6px rgba(36, 52, 70, 0.36);
        }
    }
}

//scale out

.scale-out-enter-active {
    transition: all .35s ease-in-out;
}

.scale-out-leave-active {
    transition: all .35s ease-in-out;
}

.scale-out-enter {
    transform: scale(.55);
    pointer-events: none;
    opacity: 0;
}

.scale-out-leave-to {
    transform: scale(1.2);
    pointer-events: none;
    opacity: 0;
}
</style>
