var CLIENT_ID = '475806719476-t8eketqvlhsq9meajd2gjckhu6o09rvp.apps.googleusercontent.com';
var API_KEY = 'AIzaSyA7K7pMCss687w4lfn2zC4sT6R0jdCmFXY';
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
var SCOPES = "https://www.googleapis.com/auth/calendar.readonly";
var authorizeButton = document.getElementById('authorize_button');
var signoutButton = document.getElementById('signout_button');
function handleClientLoad() {
    gapi.load('client:auth2', initClient);
}
function initClient() {
    gapi.client.init({
        apiKey: API_KEY,
        clientId: CLIENT_ID,
        discoveryDocs: DISCOVERY_DOCS,
        scope: SCOPES
    }).then(function () {
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
        updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        authorizeButton.onclick = handleAuthClick;
        signoutButton.onclick = handleSignoutClick;
    }, function(error) {
        appendPre(JSON.stringify(error, null, 2));
    });
}
function updateSigninStatus(isSignedIn) {
    if (isSignedIn) {
        authorizeButton.style.display = 'none';
        signoutButton.style.display = 'block';
        listUpcomingEvents();
    } else {
        authorizeButton.style.display = 'block';
        signoutButton.style.display = 'none';
    }
}


function handleAuthClick(event) {
    gapi.auth2.getAuthInstance().signIn();
}


function handleSignoutClick(event) {
    gapi.auth2.getAuthInstance().signOut();
}


function appendPre(message) {
    var pre = document.getElementById('content');
    var textContent = document.createTextNode(message + '\n');
    pre.appendChild(textContent);
}
function listUpcomingEvents() {
    gapi.client.calendar.events.list({
        'calendarId': 'primary',
        'timeMin': (new Date()).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        'maxResults': 6,
        'orderBy': 'startTime'


    }).then(function(response) {
        var events = response.result.items;
        appendPre('Upcoming events:');

        if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
                var event = events[i];
                var when = event.start.dateTime;
                if (!when) {
                    when = event.start.date;
                }
                if(i==0){
                    document.getElementById('text1').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                if(i==1){
                    document.getElementById('text2').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                if(i==2){
                    document.getElementById('text3').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                if(i==3){
                    document.getElementById('text4').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                if(i==4){
                    document.getElementById('text5').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                if(i==5){
                    document.getElementById('text6').value = event.summary + ',' + when;
                    console.log(event.summary);
                    console.log(when)
                }
                appendPre(event.summary + ' (' + when + ')')
            }
        } else {
            appendPre('No upcoming events found.');
        }
    });
}
