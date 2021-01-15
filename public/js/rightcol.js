function resultDiv(label, count, total, isSelected = false) {
    let percent = (Math.round(count * 10000.0 / total) / 100).toFixed(2);
    let resultDiv = $("<div></div>").addClass('my-2');
    let progress = $("<div></div>").addClass('progress');
    let progressBar = $("<div></div>").addClass('progress-bar').addClass(isSelected ? 'bg-dark' : 'bg-gray').attr("style", `width: ${percent}%`)
        .attr("aria-valuemin", "0").attr("aria-valuenow", `${count}`).attr("aria-valuemax", `${total}`);
    let labeldiv = $("<div></div>").addClass('font-weight-bold').addClass(isSelected ? 'text-dark' : 'text-secondary').text(`${label}: ${count} (${percent}%)`);
    progress.append(progressBar);
    resultDiv.append(progress, labeldiv);
    return resultDiv;
}

$(function () {
    var selectedIndex = -1;
    $.ajax({
        url: '/surveypopup',
        success: (data) => {
            survey = JSON.parse(data);
            console.log(survey);
            var surveyCard = $("<div></div>").attr("id", "surveyCard").addClass("card text-center my-3 mx-3 ml-lg-0 collapse").appendTo("#right-col");
            $("<div></div>").attr("id", "surveyCardBody").addClass("card-body").appendTo("#surveyCard");
            $("<h6></h6>").addClass("card-title font-weight-bold").html("Khảo sát chính tả").appendTo("#surveyCardBody");
            $("<p></p>").addClass("card-text").html(survey.question ? survey.question : "Bạn thường dùng cách viết nào sau đây?").appendTo("#surveyCardBody");
            var surveyBtns = [], results = [], total = 0;
            for (let i = 0; i < survey.answers.length; i++) {
                total += survey.answers[i].count;
                var surveyBtn = $("<button></button>").addClass("btn btn-outline-dark btn-block").attr("id", `surveyBtn${i}`).text(survey.answers[i].entry);
                surveyBtns.push(surveyBtn);
                $(surveyBtn).on('click', () => {
                    selectedIndex = i;
                    total++;
                    survey.answers[i].count++;
                    for (let j = 0; j < survey.answers.length; j++) {
                        resultDiv(survey.answers[j].entry, survey.answers[j].count, total, j == selectedIndex).appendTo("#surveyCardBody");
                    };
                    $("#surveyCardBody").children("button").remove();
                })
                surveyBtn.appendTo("#surveyCardBody");
            }
            surveyCard.collapse("show");
        },
        error: (xhr, status) => {
            console.log(xhr);
            console.log(status);
        }
    });
});