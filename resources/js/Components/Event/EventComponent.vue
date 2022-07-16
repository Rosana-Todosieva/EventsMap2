<template>
    <div class="container">
        <div class="row">
            <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                <ul class="event-list">
                    <li>
                        <time datetime="2022-10-20">
                            <span class="day">20</span>
                            <span class="month">Oct</span>
                            <span class="year">2022</span>
                            <span class="time">ALL DAY</span>
                        </time>
                        <img alt="Independence Day" src="data:image/jpeg;base64,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" />
                        <div class="info">
                            <h2 class="title">Charity concert</h2>
                            <p class="location"> <i class="fa fa-map-marker" style="font-size:20px"></i>  Shtip</p>
                            <p class="desc"> The money raised on this concert will go to building new homeless shelters in Shtip and Skopje. </p>
                            <ul>
                                <li style="width:50%;"><a href="#"><span class="fa fa-globe"></span> Website </a></li>
                            </ul>
                        </div>
                        <div class="social">
                            <ul>
                                <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
                                <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
                                <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EventComponent"
}
</script>

<style scoped>
@import url("http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
@import url("//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
@import url("https://kit.fontawesome.com/a076d05399.js");
body {
    padding: 60px 0;
    background-color: rgb(220, 220, 220);
}

.event-list {
    list-style: none;
    font-family: 'Lato', sans-serif;
    margin: 0;
    padding: 0;
}
.event-list > li {
    background-color: rgb(255, 255, 255);
    box-shadow: 0 0 5px rgba(51, 51, 51, 0.7);
    padding: 0;
    margin: 0 0 20px;
}
.event-list > li > time {
    display: inline-block;
    width: 100%;
    color: rgb(255, 255, 255);
    background-color: rgb(197, 44, 102);
    padding: 5px;
    text-align: center;
    text-transform: uppercase;
}
.event-list > li:nth-child(even) > time {
    background-color: rgb(165, 82, 167);
}
.event-list > li > time > span {
    display: none;
}
.event-list > li > time > .day {
    display: block;
    font-size: 50pt;
    font-weight: 100;
    line-height: 1;
}
.event-list > li time > .month {
    display: block;
    font-size: 20pt;
    font-weight: 900;
    line-height: 1;
}
.event-list > li time > .year {
    display: block;
    font-size: 22pt;
    font-weight: 900;
    line-height: 1;
}
.event-list > li > img {
    width: 100%;
}
.event-list > li > .info {
    padding-top: 5px;
    text-align: center;
}
.event-list > li > .info > .title {
    font-size: 17pt;
    font-weight: 700;
    margin: 0;
}
.event-list > li > .info > .desc {
    font-size: 12pt;
    font-weight: 300;
    margin: 0;
}
.event-list > li > .info > .location {
    font-size: 13pt;
    font-weight: 300;
    margin: 0;
    padding-right: 2px;
}
.event-list > li > .info > ul,
.event-list > li > .social > ul {
    display: table;
    list-style: none;
    margin: 10px 0 0;
    padding: 0;
    width: 100%;
    text-align: center;
}
.event-list > li > .social > ul {
    margin: 0;
}
.event-list > li > .info > ul > li,
.event-list > li > .social > ul > li {
    display: table-cell;
    cursor: pointer;
    color: rgb(30, 30, 30);
    font-size: 11pt;
    font-weight: 300;
    padding: 3px 0;
}
.event-list > li > .info > ul > li > a {
    display: block;
    width: 100%;
    color: rgb(30, 30, 30);
    text-decoration: none;
}
.event-list > li > .social > ul > li {
    padding: 0;
}
.event-list > li > .social > ul > li > a {
    padding: 3px 0;
}
.event-list > li > .info > ul > li:hover,
.event-list > li > .social > ul > li:hover {
    color: rgb(30, 30, 30);
    background-color: rgb(200, 200, 200);
}
.facebook a,
.twitter a,
.google-plus a {
    display: block;
    width: 100%;
    color: rgb(75, 110, 168) !important;
}
.twitter a {
    color: rgb(79, 213, 248) !important;
}
.google-plus a {
    color: rgb(221, 75, 57) !important;
}
.facebook:hover a {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(75, 110, 168) !important;
}
.twitter:hover a {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(79, 213, 248) !important;
}
.google-plus:hover a {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(221, 75, 57) !important;
}

@media (min-width: 768px) {
    .event-list > li {
        position: relative;
        display: block;
        width: 100%;
        height: 120px;
        padding: 0;
    }
    .event-list > li > time,
    .event-list > li > img  {
        display: inline-block;
    }
    .event-list > li > time,
    .event-list > li > img {
        width: 120px;
        float: left;
    }
    .event-list > li > .info {
        background-color: rgb(245, 245, 245);
        overflow: hidden;
    }
    .event-list > li > time,
    .event-list > li > img {
        width: 120px;
        height: 120px;
        padding: 0;
        margin: 0;
    }
    .event-list > li > .info {
        position: relative;
        height: 120px;
        text-align: left;
        padding-right: 40px;
    }
    .event-list > li > .info > .title,
    .event-list > li > .info > .desc {
        padding: 0 10px;
    }
    .event-list > li > .info > ul {
        position: absolute;
        left: 0;
        bottom: 0;
    }
    .event-list > li > .social {
        position: absolute;
        top: 0;
        right: 0;
        display: block;
        width: 40px;
    }
    .event-list > li > .social > ul {
        border-left: 1px solid rgb(230, 230, 230);
    }
    .event-list > li > .social > ul > li {
        display: block;
        padding: 0;
    }
    .event-list > li > .social > ul > li > a {
        display: block;
        width: 40px;
        padding: 10px 0 9px;
    }
}
</style>
