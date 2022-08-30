$(document).ready(function(){

    $("#personal-suggestion, #personal-social-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-circle-info"></i>&nbsp;Personal details</h4><p style="font-size:0.875rem;">Normally these would be your name, address, date of birth (although with age discrimination laws now in force this isn\'t essential), telephone number and email.</p>';

        $("#add-suggestion").html(data);
    });

    $("#objective-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-circle-check"></i>&nbsp;Objective</h4><p style="font-size:0.875rem;">- You do not need to state the specific job and company you are applying to; however, you do want to at least describe the type of position (full-time, part-time, internship) and the general tasks you would like to perform.</p><p style="font-size:0.875rem;">- Remember to keep the objective statement concise (no longer than two lines).</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#skills-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-wand-magic-sparkles"></i>&nbsp;Skills</h4><p style="font-size:0.875rem;">- The usual ones to mention are languages (good conversational French, basic Spanish), computing (e.g. "good working knowledge of MS Access and Excel, plus basic web page design skills" and driving ("full current clean driving licence").</p><p style="font-size:0.875rem;">- If you are a mature candidate or have lots of relevant skills to offer, a skills-based CV may work for you</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#work-experience-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-briefcase"></i>&nbsp;Work experience</h4><p style="font-size:0.875rem;">- Use action words such as developed, planned and organised.</p><p style="font-size:0.875rem;">- Even work in a shop, bar or restaurant will involve working in a team, providing a quality service to customers, and dealing tactfully with complaints. Don\'t mention the routine, non-people tasks (cleaning the tables) unless you are applying for a casual summer job in a restaurant or similar.</p><p style="font-size:0.875rem;">- Try to relate the skills to the job. A finance job will involve numeracy, analytical and problem solving skills so focus on these whereas for a marketing role you would place a bit more more emphasis on persuading and negotiating skills.</p><p style="font-size:0.875rem;">- All of my work experiences have involved working within a team-based culture. This involved planning, organisation, coordination and commitment e.g., in retail, this ensured daily sales targets were met, a fair distribution of tasks and effective communication amongst all staff members.</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#educations-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-user-graduate"></i>&nbsp;Education</h4><p style="font-size:0.875rem;">- List your qualifications in order of the most recent and most relevant first.</p><p style="font-size:0.875rem;">- Give details on the title of your qualification, where you studied, the grade you were awarded and the date you achieved it.</p><p style="font-size:0.875rem;">- If you have a PhD, give the full title of the PhD and the name(s) of your supervisors.</p><p style="font-size:0.875rem;">- Do not include qualifications with no relevance to the job.</p><p style="font-size:0.875rem;">- You can include qualifications for which you are currently working as long as you make it clear that you have not completed them yet.</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#activities-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-users"></i>&nbsp;Activities</h4><p style="font-size:0.875rem;">Activities are those things which are not directly related to the jobs you have done, but which show certain abilities and personal characteristics which may help you get the job.</p><p style="font-size:0.875rem;">Activities may include:</p><ul style="font-size:0.875rem;"><li>Participation in various sports, particularly team games and those done at higher levels.</li><li>Voluntary work to help the community, such as coaching children.</li><li>Helping charities, for example in fundraising.</li><li>Activities in previous jobs that were outside the job description, such as organizing social events.</li><li>Personal learning activities, such as attending webinars.</li><li>Personal money-making initiatives such as making and selling jewelery.</li></ul>';

        $("#add-suggestion").html(data);
    });
    
    $("#certification-suggestion, #award-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-trophy"></i>&nbsp;Certification(s) Awards</h4><p style="font-size:0.875rem;">List all areas of certification relevant to the position; include: type, year received.</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#interest-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-heart"></i>&nbsp;Interests</h4><p style="font-size:0.875rem;">- Don\'t put many passive, solitary hobbies (reading, watching TV, stamp collecting) or you may be perceived as lacking people skills. If you do put these, then say what you read or watch: "I particularly enjoy Dickens, for the vivid insights you get into life in Victorian times".</p><p style="font-size:0.875rem;"></p>- Show a range of interests to avoid coming across as narrow : if everything centres around sport they may wonder if you could hold a conversation with a client who wasn\'t interested in sport.<p style="font-size:0.875rem;">- Any interests relevant to the job are worth mentioning: current affairs if you wish to be a journalist; a fantasy share portfolio such as Bullbearings if you want to work in finance.</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#reference-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-trophy"></i>&nbsp;References</h4><p style="font-size:0.875rem;">- Many employers don’t check references at the application stage so unless the vacancy specifically requests referees it\'s fine to omit this section completely if you are running short of space or to say "References are available on request."</p><p style="font-size:0.875rem;">- Normally two referees are sufficient: one academic (perhaps your tutor or a project supervisor) and one from an employer (perhaps your last part-time or summer job). See our page on Choosing and Using Referees for more help with this.</p>';

        $("#add-suggestion").html(data);
    });
    
    $("#addition-info-suggestion").click(function(){
        var data='<h4 class="text-start"><i class="fa-solid fa-trophy"></i>&nbsp;Additional Info</h4><p style="font-size:0.875rem;">- No require.</p><p style="font-size:0.875rem;">- Enter more information about you.</p>';

        $("#add-suggestion").html(data);
    });


});