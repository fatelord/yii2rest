/**
 * Created by barsa on 3/27/2017.
 */
'use strict'

var app = angular.module('app', [
    'ngResource', //allows us to use $resource to call rest urls
    'ngRoute',      //$routeProvider
    'angularCSS', //Allows loading of view spcific CSS files
    'ngDialog',//alows us to implement a popup fdialog
    'ngFileUpload',//allows for file uploading
    'mgcrea.ngStrap',//bs-navbar, data-match-route directives
    'ui.router',
    'app.services',
    'app.controllers',
]);


app.config(function ($stateProvider) {
    $stateProvider.state('events', { // state for showing all movies
        url: '/events',
        templateUrl: 'partials/events.html',
        controller: 'EventsMapController'
    }).state('viewEvent', { //state for showing single movie
        url: '/events/:id/view',
        templateUrl: 'partials/event-view.html',
        controller: 'BoothViewController',
        css: 'css/booth.css'
    }).state('registerUser', { //state for adding a new movie
        url: '/events/:id/reserve',
        templateUrl: 'partials/reserve-booth.html',
        controller: 'ReserveViewController'
    }).state('uploadDocument', { //state for updating a movie
        url: '/events/:id/document',
        templateUrl: 'partials/file-upload.html',
        controller: 'DocumentViewController'
    }).state('boothSummary', {
        url: '/events/:event_id/:booth_id/boothview',
        templateUrl: 'partials/booth-summary.html',
        controller: 'BoothDetailViewController'
    });
}).run(function ($state) {
    $state.go('events'); //make a transition to products state when app starts
});




