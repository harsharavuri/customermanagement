//Constants
var ERROR_CODE = 0;
var SUCCESS_CODE = 1;

var LABORATORY = 2;
var STARTING_BATCH_INDEX = 1;

var STUDY=1;
var EXAM=2;

var SECTION_PATTERN = new RegExp("[ABCDEFGHKLMN]");

//Error Messages
var errorMsg={};

errorMsg.networkError = 'Some Error occured! Please reload/refresh the page and try again.';

//Messages
var msg={};

msg.addSection = 'Courses are getting allotted first time for this structure. Section is required.';
var DELETE_CONFIRMATION_COURSE =  'Do you really want to delete this course?';
var LOADING = 'Loading...';
var DELETE_CONFIRMATION_STRUCTURE = 'Do you really want to delete this Structure?';
var DELETE_CONFIRMATION_SPEC = 'Do you really want to delete this Specialization?';
											