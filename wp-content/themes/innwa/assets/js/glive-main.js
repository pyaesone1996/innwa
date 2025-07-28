// glive-main.js
jQuery(function ($) {

    function escapeHtml(str) {
        return str.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    function fetchAndDisplayMatches() {
        $.ajax({
            url: glive_ajax_object.ajax_url,
            type: 'GET',
            data: {
                action: 'get_glive_matches',
                security: glive_ajax_object.nonce,
            },
            // This 'success' function runs when data is received from your server
            success: function (response) {
                if (!response.success) {
                    $('#glive-match-container').html('<p class="text-center text-danger">Could not load match data.</p>');
                    return;
                }

                const matches = response.data;
                const mainContainer = $('#glive-match-container');
                const template = document.getElementById('match-row-template');

                // 1. Clear the container of old data
                mainContainer.empty().append('<h1 class="text-center">Today\'s Matches</h1>');

                if (!template || matches.length === 0) {
                    mainContainer.append('<p class="text-center">No matches available at the moment.</p>');
                    return;
                }

                if (!Array.isArray(matches) || matches.length === 0) {
                    mainContainer.append('<p class="text-center">No matches available at the moment.</p>');
                    return;
                }

                // 2. Group all matches by their league name
                const groupedByLeague = matches.reduce((acc, match) => {
                    const league = match.League || 'Uncategorized';
                    if (!acc[league]) { acc[league] = []; }
                    acc[league].push(match);
                    return acc;
                }, {});

                // 3. Loop through each league to create its own UI block
                for (const leagueName in groupedByLeague) {
                    
                    const leagueContainer = $(`
                        <div>
                            <h3 class="league-title">${escapeHtml(leagueName)}</h3>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <tbody class="match-list-body"></tbody>
                                </table>
                            </div>
                        </div>
                    `);
                    const tableBody = leagueContainer.find('.match-list-body');

                    // Loop through the matches for this league
                    groupedByLeague[leagueName].forEach(match => {
                        // Create a new row by cloning the template
                        const newRow = template.content.cloneNode(true);

                        // --- Data Binding Happens Here ---
                        newRow.querySelector('.match-time').textContent = new Date(match.TimeStart).toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
                        newRow.querySelector('.match-home').textContent = match.Home;
                        newRow.querySelector('.match-away').textContent = match.Away;

                       
                        if (match.IsLive === '1' && match.NowPlaying != 0) {
                      
                        const watchButton = `<button class="btn btn-danger btn-sm watch-live-btn" data-matchid="${match.MatchID}">Live</button>`;
                        newRow.querySelector('.match-live-status').innerHTML = watchButton;
                        }
                        else {
                            newRow.querySelector('.match-live-status').textContent = 'Upcoming';
                        }
                        
                        // Append the new, populated row to the table
                        tableBody.append(newRow);
                    });

                    // Add the entire block for this league to the main container
                    mainContainer.append(leagueContainer);
                }
            },
            error: function () {
                $('#glive-match-container').html('<p class="text-center text-danger">An error occurred while fetching data.</p>');
            }
        });
    }

    $('#glive-match-container').on('click', '.watch-live-btn', function () {
       
        const matchId = $(this).data('matchid');
        const playerContainer = $('#player-container');
        
        playerContainer.html('<p class="text-white text-center p-5">Loading Player...</p>');
       
        // Make AJAX call to get the player link
        $.ajax({
            url: glive_ajax_object.ajax_url,
            type: 'GET',
            data: {
                action: 'get_player_link',
                security: glive_ajax_object.nonce,
                matchid: matchId
            },
            dataType: 'json',
            success: function (response) {
                if (!response.success) {
                    playerContainer.html('<p class="text-danger text-center">Could not load player link.</p>');
                    return;
                }

                const playerLink = response.data;
                const navHeight = $('.navbar').outerHeight() || 0;
                const targetPosition = playerContainer.offset().top - (navHeight + 180);

                    $('html, body').animate({
                        scrollTop: targetPosition
                    }, 800)
                
                if (playerLink) {
                    playerContainer.html(`<div class="embed-responsive embed-responsive-16by9"><iframe src="${(playerLink)}" width="100%" height="650" frameborder="0" allowfullscreen></iframe></div>`);
                } else {
                    playerContainer.html('<p class="text-center text-danger p-5">Error: Could not load the video stream.</p>');
                }
            },
        });
    });

    fetchAndDisplayMatches();
    setInterval(fetchAndDisplayMatches, 300000); 
});