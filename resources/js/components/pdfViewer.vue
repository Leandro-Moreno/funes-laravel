<template>
<!--    <vue-pdf-app style="height: 100vh;" :pdf="pdfUrl"></vue-pdf-app>-->
    <div id="pdf-reader">
        <div id="pdf-toolbar">
        </div>
        <canvas id="pdf-canvas"></canvas>
    </div>
</template>

<script>
import VuePdfApp from "vue-pdf-app";
import "vue-pdf-app/dist/icons/main.css";
import pdfjsLib from 'pdfjs-dist';

export default {
    name: "pdf-viewer",
    created(){
        console.log(this.pdfUrl);
        console.log("leandro")
    },
    props: ['pdfUrl'],
    components: {
        VuePdfApp,
    },
    data() {
        return {
            pdfDocument: null,
            pageNum: 1,
            pageRendering: false,
            pageNumPending: null,
            scale: 1.5
        }
    },
    methods: {
        async renderPage(num) {
            // Set the pageRendering flag to true
            this.pageRendering = true;

            // Get the page
            const page = await this.pdfDocument.getPage(num);

            // Set the scale
            const viewport = page.getViewport({ scale: this.scale });

            // Get the canvas element
            const canvas = document.getElementById('pdf-canvas');

            // Set the dimensions of the canvas
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render the page on the canvas
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            const renderTask = page.render(renderContext);

            // Wait for rendering to finish
            await renderTask.promise;

            // Clear the pageRendering flag
            this.pageRendering = false;

            // If there is a pending page number, render it
            if (this.pageNumPending !== null) {
                await this.renderPage(this.pageNumPending);
                this.pageNumPending = null;
            }
        },
        queueRenderPage(num) {
            // If a page is already being rendered, queue the page number
            if (this.pageRendering) {
                this.pageNumPending = num;
            } else {
                this.renderPage(num);
            }
        },
        goToPrevPage() {
            if (this.pageNum <= 1) {
                return;
            }
            this.pageNum--;
            this.queueRenderPage(this.pageNum);
        },
        goToNextPage() {
            if (this.pageNum >= this.pdfDocument.numPages) {
                return;
            }
            this.pageNum++;
            this.queueRenderPage(this.pageNum);
        },
        async loadPDF(file) {
            // Load the PDF
            this.pdfDocument = await pdfjsLib.getDocument(file).promise;

            // Render the first page
            this.queueRenderPage(this.pageNum);
        }
    },
    mounted() {
        this.loadPDF(this.pdfUrl);
    }
}
</script>
