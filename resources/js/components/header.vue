<template>
    <div class="header-animated d-flex justify-content-center">
        <!-- Canvas -->
        <canvas class="orb-canvas"></canvas>
        <!-- Overlay -->
        <div class="container">
            <div class="featured-grid">
                <a class="featured-content featured-content-text featured-content-text-gradient">

                    <div class="featured-content-text-span">
                        <p class="main">Funes</p>
                        <p class="phrase">Repositorio Digital de Documentos de Educación Matemática</p>
                        <div class="featured-content-text-span-second">
                            <p class="phrase phrase-second text-gradient">Contamos con {{registroCount}} documentos</p>
                            <p class="phrase phrase-second text-gradient">{{usersCount}} usuarios</p>
                            <div class="border-top my-3"></div>
                            <p class="phrase phrase-second">Somos el 5 repositorio en Colombia</p>
                        </div>
                    </div>
                </a>
                <a href="./latest" class="featured-content">


                    <div class="featured-content-img">
                    </div>
                    <div class="featured-content-info">
                        <h3 class="title title-white">
                            Registros recientes
                        </h3>
                    </div>
                </a>
                <a href="" class="featured-content">
                    <div class="featured-content-img">
                    </div>
                    <div class="featured-content-info">
                        <h3 class="title title-white">
                            Búsqueda Avanzada
                        </h3>
                    </div>
                </a>
                <a href="./subject" class="featured-content">
                    <div class="featured-content-img">
                    </div>
                    <div class="featured-content-info">
                        <h3 class="title title-white">
                            Términos Claves
                        </h3>
                    </div>
                </a>
                <a href="./about-us" class="featured-content">


                    <div class="featured-content-img">
                    </div>
                    <div class="featured-content-info">
                        <h3 class="title title-white">
                            Acerca de Funes
                        </h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: "header-animated",
    mounted() {
        axios.get('../api/count')
            .then(response => {
                this.registroCount = response.data.registros;
                this.usersCount = response.data.users;
                console.log(response);
            })
    },
    data(){
        return {
            registroCount: 0,
            usersCount: 0,
        }
    },
    props: ['pdfUrl'],
    methods: {

    },
};
</script>

<style lang="scss">
:root {
    --hue: 277;
    --hue-complimentary1: 307;
    --hue-complimentary2: 337;
    --dark-color: hsl(var(--hue), 100%, 9%);
    --light-color: hsl(var(--hue), 95%, 98%);
    --base: hsl(var(--hue), 95%, 50%);
    --complimentary1: hsl(var(--hue-complimentary1), 95%, 50%);
    --complimentary2: hsl(var(--hue-complimentary2), 95%, 50%);


    --bg-gradient: linear-gradient(
        to bottom,
        hsl(var(--hue), 95%, 99%),
        hsl(var(--hue), 95%, 84%)
    );
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.featured-content-img::before{
    background: linear-gradient(
            360deg, black 0%, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 0%)!important;
}
.header-animated{
    margin: 0;
    padding-bottom: 5vh;
    padding-top: 5vh;
    display: block;
    overflow: hidden;
    position: relative;
    &::before {
        content: "";
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -9;
        position: absolute;
        /*background: linear-gradient(
                360deg, rgba(247, 247, 247, 1), rgba(247, 247, 247, 0) 90%, rgba(247, 247, 247, 1) 100%);*/
    }
}


.orb-canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow-y:hidden;
    z-index: -10;
    //background-color: #f0effd;
    background-color: var(--funes-contrast-light);
}

strong {
    font-weight: 600;
}
.featured-content{
    background: rgba(255, 255, 255, 1);
    box-shadow: 0 0.75rem 2rem 0 rgba(0, 0, 0, 0.1);
    border-radius: 1rem;
    //border: 3px solid #5450a9;
    z-index: 1;
    &::first-child{
        background: #ffffff !important;
        &::before {
            margin: -3px; /* !importanté */
            border-radius: inherit; /* !importanté */
            background: linear-gradient(to right, var(--base), var(--complimentary2));
        }
    }
    &:hover{
        &::first-child {
            border: 3px solid #5450a9;
            background: rgba(255, 255, 255, 1) !important;
        }
        background: #5450a9;
        transition: all 0.3s ease-in-out;
        .featured-content-info{
            background-color: white;
            color:#5450a9;
        }
        &::before{
            background: white;
        }
    }
}

.overlay {
    width: 100%;
    max-width: 1140px;
    max-height: 640px;
    padding: 8rem 6rem;
    display: flex;
    align-items: center;
    backdrop-filter: blur(19px) saturate(200%);
    -webkit-backdrop-filter: blur(19px) saturate(200%);
    background: rgba(255, 255, 255, 0.69);
    border: 1px solid rgba(209, 213, 219, 0.3);


    //background: rgba(255, 255, 255, 0.375);
    box-shadow: 0 0.75rem 2rem 0 rgba(0, 0, 0, 0.1);
    border-radius: 2rem;
    //border: 1px solid rgba(255, 255, 255, 0.125);
}

.overlay__inner {
    max-width: 36rem;
}

.overlay__title {
    font-size: 1.875rem;
    line-height: 2.75rem;
    font-weight: 700;
    letter-spacing: -0.025em;
    margin-bottom: 2rem;
}

.text-gradient {
    background-image: linear-gradient(
        45deg,
        var(--base) 25%,
        var(--complimentary2)
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-background-clip: text;
    -moz-text-fill-color: transparent;
}

.overlay__description {
    font-size: 1rem;
    line-height: 1.75rem;
    margin-bottom: 3rem;
}

.overlay__btns {
    width: 100%;
    max-width: 30rem;
    display: flex;
}

.overlay__btn {
    width: 50%;
    height: 2.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--light-color);
    background: var(--dark-color);
    border: none;
    border-radius: 0.5rem;
    transition: transform 150ms ease;
    outline-color: hsl(var(--hue), 95%, 50%);
}

.overlay__btn:hover {
    transform: scale(1.05);
    cursor: pointer;
}

.overlay__btn--transparent {
    background: transparent;
    color: var(--dark-color);
    border: 2px solid var(--dark-color);
    border-width: 2px;
    margin-right: 0.75rem;
}

.overlay__btn-emoji {
    margin-left: 0.375rem;
}

a {
    text-decoration: none;
    color: var(--dark-color);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Not too many browser support this yet but it's good to add! */
@media (prefers-contrast: high) {
    .orb-canvas {
        display: none;
    }
}

@media only screen and (max-width: 1140px) {
    .overlay {
        padding: 8rem 4rem;
    }
}

@media only screen and (max-width: 840px) {
    body {
        //padding: 1.5rem;
    }
    .featured-content{
        margin: 10px 0;
        &::first{
            margin: 0;
        }
    }
    .featured-content-img{
        height: 80px;
    }
    .overlay {
        padding: 4rem;
        height: auto;
    }

    .overlay__title {
        font-size: 1.25rem;
        line-height: 2rem;
        margin-bottom: 1.5rem;
    }

    .overlay__description {
        font-size: 0.875rem;
        line-height: 1.5rem;
        margin-bottom: 2.5rem;
    }
}

@media only screen and (max-width: 600px) {
    .overlay {
        padding: 1.5rem;
    }

    .overlay__btns {
        flex-wrap: wrap;
    }

    .overlay__btn {
        width: 100%;
        font-size: 0.75rem;
        margin-right: 0;
    }

    .overlay__btn:first-child {
        margin-bottom: 1rem;
    }
}

</style>
