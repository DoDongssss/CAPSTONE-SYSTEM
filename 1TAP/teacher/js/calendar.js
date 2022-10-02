let nav = 0;
let click = null;
let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

function load(){
    const dt = new Date();

    if(nav !== 0){
        dt.setMonth(new Date().getMonth() + nav)
    }

    const day = dt.getDate();
    const month = dt.getMonth();
    const year = dt.getFullYear();

    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
        weekday: 'long',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
    });
    const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

    document.getElementById('monthDisplay').innerText = 
    `${dt.toLocaleDateString('en-us', {month: 'long'})} ${year}`;

    calendar.innerHTML = '';

    for(let i = 1; i <= paddingDays + daysInMonth; i++){
        const daysSquare = document.createElement('div');
        daysSquare.classList.add('day');

        const dayString = `${month + 1}/${i - paddingDays}/${year}`;

        if(i - paddingDays === day && nav === 0){
            daysSquare.id = 'currentDay';
        }

        if(i > paddingDays){
            daysSquare.innerHTML = i - paddingDays;

            const eventForDay = events.find(e => e.date === dayString)
            if(eventForDay){
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('event');
                eventDiv.innerHTML = eventForDay.title;
                daysSquare.appendChild(eventDiv); 
            }

            daysSquare.addEventListener('click', ()=> openModal(dayString));
        } else{
            daysSquare.classList.add('padding');
        }

        calendar.appendChild(daysSquare);
    }
    console.log(paddingDays);
}

// OPEN MODAL
function openModal(date){
    clicked = date;

    const eventForDay = events.find(e => e.date == clicked);

    if(eventForDay){
        document.getElementById('eventText').innerText = eventForDay.title;
        deleteEventModal.style.display = 'block';
    }
    else{
        newEventModal.style.display = 'block';
    }

    backDrop.style.display = 'block';
}
// CLOSE MODAL
function closeModal(){
    eventTitleInput.classList.remove('error');
    newEventModal.style.display = 'none';
    deleteEventModal.style.display = 'none';
    backDrop.style.display = 'none';
    eventTitleInput.value = '';
    clicked = null;
    load();
}

// SAVE EVENT MODAL
function saveEvent(){
    if(eventTitleInput.value){
        eventTitleInput.classList.remove('error');

        events.push({
            date: clicked,
            title: eventTitleInput.value,
        });

        localStorage.setItem('events', JSON.stringify(events));
        closeModal();
    }
    else{
        eventTitleInput.classList.add('error');
    }
}

function deleteEvent(){
    events = events.filter(e => e.date !== clicked);
    localStorage.setItem('events', JSON.stringify(events));
    closeModal();
}

function initButton(){
    document.getElementById('nextButton').addEventListener('click', ()=>{
        nav++
        load();
    })
    document.getElementById('backButton').addEventListener('click', ()=>{
        nav--
        load();
    })

    // MODAL BUTTON OPTION -  ADD EVENT
    document.getElementById('saveButton').addEventListener('click', saveEvent);
    document.getElementById('cancelButton').addEventListener('click', closeModal);

    // MODAL BUTTON - OPEN THE VENT
    document.getElementById('deleteButton').addEventListener('click', deleteEvent);
    document.getElementById('closeButton').addEventListener('click', closeModal);
}
initButton();
load();