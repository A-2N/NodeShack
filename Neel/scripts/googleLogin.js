function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id = profile.getId()
    var id_token = googleUser.getAuthResponse().id_token;
    console.log(id)
    console.log(id_token)
    sessionStorage.setItem('id', id_token.toString())
    //console.log('Given Name: ' + profile.getGivenName());
    //console.log('Family Name: ' + profile.getFamilyName());
    var email = profile.getEmail();
    var firstName = profile.getGivenName();
    var lastName = profile.getFamilyName();
    document.getElementById('firstName').value = firstName;
    document.getElementById('lastName').value = lastName;
    document.getElementById('email').value = email;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://yourbackend.example.com/tokensignin');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        console.log('Signed in as: ' + xhr.responseText);
    };
    xhr.send('idtoken=' + id_token);
    document.getElementById('google').value = id;

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }
}
