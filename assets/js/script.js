document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.endsWith('lectures.html')) {
        fetchLectures();
    }
});
function fetchLectures() {
    fetch('/api/lectures')
        .then(response => response.json())
        .then(lectures => {
            const lecturesList = document.getElementById('lecturesList');
            lecturesList.innerHTML = '';
            lectures.forEach(lecture => {
                const lectureItem = document.createElement('div');
                lectureItem.textContent = lecture.replace('.md', '');
                lectureItem.classList.add('lecture-item');
                lectureItem.addEventListener('click', () => loadLecture(lecture));
                lecturesList.appendChild(lectureItem);
            });
        });
}

function loadLecture(lecture) {
    fetch(`/api/lectures/${lecture}`)
        .then(response => response.text())
        .then(content => {
            document.getElementById('lectureContent').innerHTML = content;
            generateHeadingsList(content);
        });
}
function generateHeadingsList(content) {
    const lectureContentDiv = document.createElement('div');
    lectureContentDiv.innerHTML = content;
    const headings = lectureContentDiv.querySelectorAll('h1, h2, h3, h4, h5, h6');
    const headingsList = document.getElementById('headingsList');
    headingsList.innerHTML = '';
    headings.forEach(heading => {
        const headingItem = document.createElement('div');
        headingItem.textContent = heading.textContent;
        headingItem.classList.add('heading-item');
        headingItem.addEventListener('click', () => {
            heading.scrollIntoView({ behavior: 'smooth' });
        });
        headingsList.appendChild(headingItem);
    });
}