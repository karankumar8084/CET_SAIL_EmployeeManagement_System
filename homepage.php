<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="homepage.css">
  <title>SAIL CET Homepage</title>

  

  
  <style>
  :root {
    --primary-color:	#1e3a5f;
    --background: #f8f9fa;
    --text-color: #212529;
    --white: #ffffff;
  }

html,body{
  height:100%;
  margin:0;
  padding:0;
  font-family:"Segoe UI",Tahoma,Geneva,Verdana,sans-serif;
  background:var(--background);
  color:var(--text-color);
}



 header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: var(--primary-color);
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 2px 0 10px rgba(0, 255, 255, 0.5);
}

.left-logo {
  height: 60px;  /* Match your header height */
  display: flex;
  align-items: center;
}

  .left-logo img {
  height: 110%;
  max-height: 70px;  /* Adjust to fit header */
  width: auto;
  object-fit: contain; /* Ensures full image is visible without cropping */
  display: block;
}


  nav.navbar {
    display: flex;
    gap: 16px;
    align-items: center;
    position: relative;
  }

  nav.navbar a,
  nav.navbar button {
    color: var(--white);
    text-decoration: none;
    padding: 3px 12px;
    border-radius: 50px;
    font-weight: 500;
    transition: all 0.3s ease;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    position: relative;
  }

  nav.navbar a:hover,
  nav.navbar button:hover {
    filter: brightness(1.2);
    transform: scale(1.05);
  }

  nav.navbar a:nth-child(1) { background-color: #6f42c1; }
  nav.navbar a:nth-child(2) { background-color: #fd7e14; }
  nav.navbar a:nth-child(3) { background-color: #20c997; }
  nav.navbar a:nth-child(4) { background-color: #e83e8c; }
  nav.navbar a:nth-child(5) { background-color: #198754; }
  nav.navbar a:nth-child(6) { background-color: #ffc107; }
  nav.navbar a:nth-child(7) { background-color: #0dcaf0; }

  .header-actions {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .header-btn {
    width: -400px;
    font-size: 20px;
    background: none;
    border: none;
    color: var(--white);
    cursor: pointer;
    padding: 6px;
    transition: transform 0.2s ease;
  }

  .header-btn:hover {
    transform: scale(1.1);
  }

  .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.3);
    display: none;
    align-items: flex-start;
    justify-content: center;
    padding-top: 90px;
    z-index: 1200;
  }

  .modal-backdrop.show {
    display: flex;
  }

  .docs-modal {
    background: var(--white);
    padding: 25px 30px;
    border-radius: 8px;
    box-shadow: 0 8px 20px rgba(145, 34, 224, 0.15);
    max-width: 320px;
    width: 90%;
    box-sizing: border-box;
    position: relative;
    max-height: 80vh;
    overflow-y: auto;
  }

  .docs-modal h3 {
    margin-top: 0;
    font-size: 22px;
    color: var(--primary-color);
    margin-bottom: 15px;
  }

  .docs-modal a {
    display: block;
    padding: 10px 10px;
    color: var(--text-color);
    text-decoration: none;
    font-size: 16px;
    border-bottom: 1px solid #eee;
    transition: all 0.2s ease;
    border-radius: 6px;
  }

  .docs-modal a:last-child {
    border-bottom: none;
  }

  .docs-modal a:hover {
    color: var(--primary-color);
    background-color: aqua;
    border-radius: 6px;
    padding-left: 14px;
  }

  .close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #888;
    transition: color 0.2s ease;
  }

  .close-btn:hover {
    color: var(--primary-color);
  }

  .side-panel {
    position: fixed;
    top: 0;
    right: -260px;
    width: 140px;
    height: 100%;
    background-color: var(--white);
    box-shadow: -4px 0 12px rgba(0, 0, 0, 0.1);
    z-index: 1100;
    transition: right 0.3s ease;
    display: flex;
    flex-direction: column;
    padding: 20px;
  }

  .side-panel h3 {
    margin-top: 0;
    font-size: 18px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 8px;
  }

  .side-panel a {
    text-decoration: none;
    color: var(--text-color);
    padding: 10px 0;
    font-size: 15px;
  }


/* === SIDEBAR (leaves 15 px at bottom) === */
.sidebar-scroll {
  position: fixed;
  top: 70px;
  bottom: 15px;
  left: 0;
  width: 200px;
  background-color: rgb(213, 43, 196);
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.12);
  color: white;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  z-index: 999;

  overflow-y: auto;
  padding-bottom: 10px; /* Optional: gives breathing room */
  scrollbar-width: none; /* Firefox: hidden by default */
  -ms-overflow-style: none;  /* IE 10+ */
}

/* override sidebar fixed height */
.sidebar-scroll {
    overflow-y: auto;
    height: auto !important;
}


.profile-sec {
    padding: 15px 10px;
    text-align: center;
    border-bottom: 1px solid rgba(185, 214, 17, 0.1);
    position: relative;
    color: white;
    background-color: #e83e8c; /* Deep Aqua */
    color: white;
} 

.profile-sec img {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    border: 2px solid whitesmoke;
    object-fit: cover;
}

.profile-sec .username {
    font-size: 14px;
    font-weight: bold;
    color: white;
    margin-top: 8px;
}

.profile-sec .sail-cet-label {
    margin-top: 10px;
    font-size: 15px;
    font-weight: bold;
    color: #ffdd57;
    background: rgba(255, 255, 255, 0.1);
    padding: 4px 10px;
    border-radius: 10px;
    display: inline-block;
}

.caret {
    margin-left: 5px;
    border-top: 5px solid rgb(255, 255, 255);
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    display: inline-block;
}

.dropdown-menu {
    background-color: yellowgreen;
    border: none;
    border-radius: 4px;
    box-shadow: 0 5px 15px #ec0a0a33;
    padding: 5px 0;
    display: none;
    position: absolute;
    width: 90%;
    left: 5%;
    z-index: 1000;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu li {
    list-style: none;
}

.dropdown-menu li a {
    color: white;
    padding: 10px 15px;
    display: block;
    font-size: 13px;
    text-decoration: none;
}

.dropdown-menu li a:hover {
    background-color: #2ec5e3;
    color: white;
}

.dropdown-menu li i {
    margin-right: 8px;
}

.navbar-inverse .navbar-search {
    padding: 10px;
    background-color: #1f2d3d;
    display: none;
}

.navbar-inverse .navbar-search input {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: none;
    background-color: #2e3b4e;
    color: white;
}

@media (max-width: 767px) {
    .navbar-inverse .navbar-search {
        display: block;
    }
}

.sidebar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.sidebar-menu li {
    border-bottom: 1px solid rgba(198, 26, 26, 0.05);
}

.sidebar-menu li a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #d1d5db;
    padding: 12px 18px;
    font-size: 14px;
    text-decoration: none;
    transition: background 0.3s;
}

.sidebar-menu li a:hover {
    background-color: #a5d5a3;
    color: white;
}

/* === MULTI-COLOR SIDEBAR SECTIONS === */
.sidebar-menu li:nth-child(1) a,
.sidebar-menu li:nth-child(2) a,
.sidebar-menu li:nth-child(3) a {
    background-color: #20c997;
    color: white;
}

.sidebar-menu li:nth-child(1) a:hover,
.sidebar-menu li:nth-child(2) a:hover,
.sidebar-menu li:nth-child(3) a:hover {
    background-color: #007ea7;
}

.sidebar-menu li:nth-child(4) {
    background-color: #ffb703;
    color: black;
    font-weight: bold;
    text-align: center;
    padding: 12px 18px;
}

.sidebar-menu li:nth-child(n+5) a {
    background-color: #1e3a5f;
    color: #d1d5db;
}

.sidebar-menu li:nth-child(n+5) a:hover {
    background-color: #00b4d8;
    color: white;
}

/* === EMOJI ICONS === */
.sidebar-menu li a::before {
    font-size: 16px;
    display: inline-block;
    width: 22px;
    color: #00b4d8;
}

.sidebar-menu li:nth-child(1) a::before { content: "🏠"; }
.sidebar-menu li:nth-child(2) a::before { content: "👑"; }
.sidebar-menu li:nth-child(3) a::before { content: "🛠️"; }
.sidebar-menu li:nth-child(5) a::before { content: "📢"; }
.sidebar-menu li:nth-child(6) a::before { content: "💰"; }
.sidebar-menu li:nth-child(7) a::before { content: "👥"; }
.sidebar-menu li:nth-child(8) a::before { content: "📄"; }
.sidebar-menu li:nth-child(9) a::before { content: "📨"; }
.sidebar-menu li:nth-child(10) a::before { content: "📆"; }
.sidebar-menu li:nth-child(11) a::before { content: "🖼️"; }
.sidebar-menu li:nth-child(12) a::before { content: "🧑"; }
.sidebar-menu li:nth-child(13) a::before { content: "💬"; }
.sidebar-menu li:nth-child(14) a::before { content: "🏞️"; }
.sidebar-menu li:nth-child(15) a::before { content: "📅"; }
.sidebar-menu li:nth-child(16) a::before { content: "📚"; }
.sidebar-menu li:nth-child(17) a::before { content: "🔗"; }
.sidebar-menu li:nth-child(18) a::before { content: "💊"; }
.sidebar-menu li:nth-child(19) a::before { content: "📢"; }
.sidebar-menu li:nth-child(20) a::before { content: "📰"; }
.sidebar-menu li:nth-child(21) a::before { content: "📜"; }
.sidebar-menu li:nth-child(22) a::before { content: "📊"; }
.sidebar-menu li:nth-child(23) a::before { content: "📝"; }
.sidebar-menu li:nth-child(24) a::before { content: "🏗️"; }
.sidebar-menu li:nth-child(25) a::before { content: "🛠️"; }
.sidebar-menu li:nth-child(26) a::before { content: "🚗"; }
.sidebar-menu li:nth-child(27) a::before { content: "💡"; }
.sidebar-menu li:nth-child(28) a::before { content: "📞"; }
.sidebar-menu li:nth-child(29) a::before { content: "🎓"; }
.sidebar-menu li:nth-child(30) a::before { content: "📋"; }
.sidebar-menu li:nth-child(31) a::before { content: "🎬"; }
.sidebar-menu li:nth-child(32) a::before { content: "💳"; }
.sidebar-menu li:nth-child(33) a::before { content: "📘"; }

/* === CUSTOM SCROLLBAR FOR SIDEBAR === */
/* Hide scrollbar by default, show only on hover */

/* Firefox: Hide scrollbar */
.sidebar-scroll {
    scrollbar-width: none; /* Hide scrollbar in Firefox */
    -ms-overflow-style: none;  /* Hide scrollbar in IE 10+ */
}

/* Webkit Browsers: Hide scrollbar */
.sidebar-scroll::-webkit-scrollbar {
    width: 0;
    transition: width 0.3s;
}

/* Show scrollbar on hover for Webkit Browsers */
.sidebar-scroll:hover::-webkit-scrollbar {
    width: 6px; /* thin scrollbar on hover */
}

.sidebar-scroll::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar-scroll::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.4); /* scroll thumb color */
    border-radius: 10px;
}

/* Firefox: Show thin scrollbar on hover */
.sidebar-scroll:hover {
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.4) transparent;
}
/* === THIN SIDEBAR SCROLLBAR === */

/* Hide scrollbar by default (Webkit) */
.sidebar-scroll::-webkit-scrollbar {
    width: 0px;
}

/* Show thin scrollbar on hover (Webkit) */
.sidebar-scroll:hover::-webkit-scrollbar {
    width: 6px;
}

/* Track (Webkit) */
.sidebar-scroll::-webkit-scrollbar-track {
    background: transparent;
}

/* Thumb (Webkit) */
.sidebar-scroll::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 10px;
}

/* Firefox scrollbar: thin and only on hover */
.sidebar-scroll {
    scrollbar-width: none; /* Hide by default */
}

.sidebar-scroll:hover {
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.4) transparent;
}


.sidebar-scroll {
    height:650px !important;  /* Force height to match banner */
    overflow-y: auto;
    width: 220px; /* Optional: if you want fixed width */
}


/* === THIN WHITE SCROLLBAR ON SIDEBAR HOVER === */

/* Chrome, Edge, Safari */
.sidebar-scroll::-webkit-scrollbar {
  width: 0px;
  transition: width 0.3s ease;
}

.sidebar-scroll:hover::-webkit-scrollbar {
  width: 6px;
  
}

.sidebar-scroll::-webkit-scrollbar-track {
  background: transparent;
}

.sidebar-scroll::-webkit-scrollbar-thumb {
  background-color: white; /* Change to white */
  border-radius: 10px;
}

/* Firefox */
.sidebar-scroll {
  scrollbar-width: none;
}

.sidebar-scroll:hover {
  scrollbar-width: thin;
  scrollbar-color: white transparent; /* White scrollbar thumb */
}
.sidebar-scroll {
    width: 200px; /* or try 160px for even thinner */
}


  
/* Global Box-Sizing */
*, *::before, *::after {
  box-sizing: border-box;
}

.video-wrapper {
  position: relative;
  width: calc(100% - 220px);   /* sidebar-aware width */
  height: 300px;               /* reduced overall height slightly */
  margin: 90px 0 60px 210px;   /* more space below, less above */
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  background: #000;
}

/* ✅ Updated video for better fit */
.video-wrapper video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center -340px;  /* 👈 shift video upar, so neeche dikhe */
  position: relative;
  z-index: 1;
  background: #000;
  transform: scaleX(-1);
}



/* ✅ Overlay title on video */
.video-overlay-title {
  position: absolute;
  top: 25px;
  right: 200px;
  z-index: 3;
  color: #ffffff;
  font-size: 20px;
  font-weight: bold;
  text-transform: uppercase;
  text-align: right;
}

/* Main underline title */
.main-title {
  position: relative;
  display: inline-block;
  padding-bottom: 1px;
}

.main-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  right: 5px;
  left: 10px;
  width: calc(100% - 10px);
  height: 2px;
  background-color: #ffffff;
  border-bottom-left-radius: 100px;
  border-bottom-right-radius: 100px;
}

/* Subtext */
.overlay-subtext {
  width:125%;
  right:50px;
  margin-top: 20px;
  font-size: 25px;
  font-weight: 400;
  font-family: 'Roboto', sans-serif;
  color: #f0eaea;
  text-align: right;
  word-spacing: 8px;
}

/* Overlay Description */
.overlay-description {
  margin-top: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  font-size: 10px;
  font-weight: 500;
  color: #d8d8d8;
  line-height: 1.6;
    width:155%;
  right:80px;
}

.overlay-description .line1 {
  transform: translateX(0);  /* center under subtext */
}

.overlay-description .line2 {
  transform: translateX(10px);
}

.overlay-description .line3 {
  transform: translateX(20px);
}




.arrow-sign {
  font-size: 36px;
  color: white;
  text-align: center;
  margin-top: 5px;
  opacity: 0.5;
}

.chat-button {
  display:inline;
  margin: 20px auto;
  padding: 12px 24px;
  font-size: 12px;
  font-weight: 400;
  color: white;
  background-color: #28a745;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.chat-button:hover {
  background-color: #218838;
}



/* Arrow sign style */
.arrow-sign {
  font-size: 28px;
  color: #ffffff;
  margin-top: 10px;
  text-align: center;
}

/* Let's Talk button style */
.lets-talk-btn {
  margin-top: 10px;
  padding: 10px 22px;
  background-color: #00b894;
  color: #fff;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}
.lets-talk-btn:hover {
  background-color: #019875;
}


/* Fade-Up Float Animation - Smooth & Continuous */
@keyframes zoomFadeUpStay {
  0% {
    opacity: 0;
    transform: translateY(30px) scale(0.85);
  }
  60% {
    opacity: 1;
    transform: translateY(0) scale(1.05);
  }
  100% {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.fade-top {
  animation-name: zoomFadeUpStay;
  animation-duration: 1.8s;
  animation-timing-function: ease-out;
  animation-fill-mode: forwards; /* ✅ Keeps the final state */
  animation-iteration-count: 1;  /* ✅ Run only once */
}






.important-events-wrapper {
  position: relative;
  margin: 98px 0 -75px 220px; /* space below header, aligned to sidebar */
  width: calc(100% - 240px);
  min-height: 40px;
  display: flex;
  border-radius: 1400px;
  background: linear-gradient(to right, #ffffff, #f7f7f7);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  border-left: 6px solidrgb(202, 222, 238);
  z-index: 5; /* higher than video, lower than header */
}



.events-message-box {
  color:rgb(198, 181, 181);
  flex-grow: 1;
  padding: 0 20px;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.events-message-box marquee {
  color:rgb(15, 94, 174);
  font-size: 17px;
  font-weight: 500;
  letter-spacing: 0.5px;
  white-space: nowrap;
}




.section-separator {
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  color: #333;
  margin: -25px 20px;         /* top-bottom + right spacing */
  margin-left: 220px;        /* ✅ Sidebar ke baad line start */
  position: relative;
}

/* ✅ Solid line + bottom shadow */
.section-separator::before,
.section-separator::after {
  content: "";
  flex: 1;
  height: 1px;
  background-color: #aaa;    /* ✅ Straight line */
  position: relative;
  top: 1px;                  /* Align with text */
  margin: 0 10px;            /* Space between text and line */
  box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 1);  /* ✅ Shadow only below */
}








/* calender */
/* Remove absolute positioning to place calendar below grid */


/* alerts-reports  */


/* Header inside tile */
.custom-tile.alerts-tile {
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
  padding: 0;
  overflow: hidden;
}

/* Header same style as calendar */
.custom-tile.alerts-tile .tile-header {
  margin: 0;
  padding: 11px;
background: linear-gradient(to right, #f12711, #f5af19);


  color: white;
  font-size: 15px;
  text-align: center;
  border-radius: 8px 8px 0 0;
}


/* Scrollable content that fills remaining space */
.custom-tile.alerts-tile .alert-list {
  flex-grow: 1;
  padding: 10px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 8px;
  max-height: unset;
}

/* Alert item design */
.alert-item {
  display: flex;
  gap: 8px;
  background: #f9fafb;
  border: 1px solid #e5e7eb;
  padding: 6px;
  border-radius: 6px;
}

/* Icon box */
.alert-icon {
  width: 24px;
  height: 24px;
  background: #bef264;
  border-radius: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 14px;
  color: #444;
}

/* Alert content */
.alert-content a {
  color: #2563eb;
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
}

.alert-meta {
  font-size: 10px;
  color: #374151;
}

/* Hide scrollbar */
.alert-list::-webkit-scrollbar {
  display: none;
}
.alert-list {
  scrollbar-width: none;
}




/* Main container structure */
.custom-tile.group-message-tile {
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
  padding: 0;
  overflow: hidden;
  display: flex;
}

/* Header like alerts-tile */
.group-message-tile .tile-header {
  margin: 0;
  padding: 11px;
background: linear-gradient(to right, #2193b0, #6dd5ed);

  color: white;
  font-size: 15px;
  text-align: center;
  border-radius: 2px 2px 0 0;
}

/* Scrollable chat/message body */
.message-list {
  flex-grow: 1;
  padding: 10px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 8px;
  background: #f9fafb;
}

/* Message input area at bottom */
.message-input-area {
  display: flex;
  padding: 8px;
  background-color: #e2e8f0;
  border-top: 1px solid #cbd5e1;
}

/* Input box styling */
.message-input {
  flex-grow: 1;
  padding: 6px 10px;
  font-size: 13px;
  border: 1px solid #cbd5e1;
  border-radius: 4px;
  outline: none;
}

/* Send button styling */
.send-button {
  padding: 6px 12px;
  margin-left: 8px;
  background-color: #2563eb;
  color: white;
  border: none;
  border-radius: 4px;
  font-size: 13px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

.send-button:hover {
  background-color: #1d4ed8;
}

/* Optional: hide scrollbars */
.message-list::-webkit-scrollbar {
  display: none;
}
.message-list {
  scrollbar-width: none;
}

/* Message bubbles */
.message-bubble {
  max-width: 80%;
  padding: 10px 12px 18px;
  border-radius: 12px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 1.5;
  position: relative;
  word-wrap: break-word;
  display: flex;
  flex-direction: column;
}

/* Sender's own message */
/* Sender's own message */
.own-message {
  background-color: #dcf8c6;
  align-self: flex-end;
  border-radius: 12px 12px 0 12px;
  padding: 10px;
  max-width: 70%;
  font-size: 14px;
  margin-bottom: 10px;
}
.other-message {
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

.other-message .avatar {
  width: 35px;
  height: 35px;
  background-color: #007bff;
  color: white;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  font-weight: bold;
}
/* Outer message container for other users */
.message-item.other-message {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  max-width: 80%;
  align-self: flex-start;
}

/* Circle avatar with initials */
.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: #0d6efd;
  color: #fff;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  flex-shrink: 0;
}

/* Bubble container */
.bubble-container {
  background-color: #fff;
  padding: 10px;
  border-radius: 12px 12px 12px 0;
  border: 1px solid #ddd;
  max-width: 70%;
  font-size: 14px;
}

/* Sender name */
.bubble-container .message-sender {
  color: #0d6efd;
  font-weight: bold;
  margin-bottom: 4px;
  font-size: 13px;
}

/* Actual message text */
.bubble-container .message-text {
  margin-bottom: 4px;
  color: #000;
  word-wrap: break-word;
}

/* Time */
.bubble-container .message-time {
  align-self: flex-end;
  font-size: 12px;
  color: #555;
  font-style: italic;
}




/* birthday-wishes */
/* Birthday Tile Container */
.custom-tile.birthday-tile {
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
}

.birthday-tile .tile-header {
 background: linear-gradient(to right, #8e2de2, #ff6a00);
  color: white;
  font-size: 16px;
  padding: 10px 15px;
  margin: 0;
  text-align: center;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  border-radius: 8px 8px 0 0;
  flex-shrink: 0;
}

.birthday-tile .birthday-container {
  flex-grow: 1;
  overflow: hidden;
  position: relative;
}

.birthday-tile .birthday-slider {
  display: flex;
  flex-direction: column;
  animation: scrollBirthday 15s linear infinite;
}

/* Card style */
.birthday-card {
  display: flex;
  align-items: center;
  gap: 8px;
  background: #fff;
  border: 1px solid #ccc;
  padding: 8px;
  margin: 6px;
  box-sizing: border-box;
  height: 90px;
}

.birthday-card img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.birthday-text {
  flex-grow: 1;
  font-size: 12px;
  color: #000;
}

.birthday-text .name {
  font-weight: bold;
}

.birthday-text .designation {
  font-size: 11px;
}

.birthday-msg {
  color: green;
  font-weight: bold;
}

.wish-button {
  background-color: #8bc34a;
  border: none;
  padding: 5px 10px;
  color: white;
  font-weight: bold;
  cursor: pointer;
}

.birthday-card {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeSlide 1s ease forwards;
  animation-delay: calc(var(--i) * 3s);
}

@keyframes fadeSlide {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}






.tile-slider-container {
  position: relative;
  width: 100vw;
  padding-left: 220px; /* tiles start after 220px */
  box-sizing: border-box;
  margin: 80px 0;
  display: flex;
  flex-direction: column; /* ✅ added to allow vertical stacking */
  justify-content: flex-start;
  align-items: flex-start;
}

.tile-slider-wrapper {
  overflow: hidden;
  width: calc(100vw - 220px - 10px); /* fills remaining width, leaves 10px right space */
  height: 456px;
  position: relative;
}

.tile-slider-pages {
  display: flex;
  transition: transform 0.9s ease;
  width: 100%;
}

.tile-page {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-template-rows: repeat(3, 120px);
  gap: 16px;
  width: 100%;
  flex-shrink: 0;
  box-sizing: border-box;
  padding: 0 16px; /* tighter padding to bring tiles closer to nav buttons */
}

.tile {
  color: white;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-end;
  font-weight: bold;
  border-radius: 10px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.5);
  font-size: 16px;
  text-align: left;
  text-decoration: none;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  padding: 14px 14px 12px 14px;
  position: relative;
  animation: fadeSlideRise 1.4s ease-out;
  width: 100%;
}

.tile:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.9);
}

.tile i {
  font-size: 36px;
  margin-bottom: 10px;
  animation: bounceIcon 1.5s infinite;
}

@keyframes fadeSlideRise {
  0% {
    opacity: 0;
    transform: translateY(100px) scale(0.85);
  }
  50% {
    opacity: 1;
    transform: translateY(-10px) scale(1.05);
  }
  100% {
    transform: translateY(0) scale(1);
  }
}

@keyframes bounceIcon {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-6px);
  }
}

.slider-btn-wrapper {
  position: relative;
  width: fit-content;
  margin: -30px auto 0 auto; /* 👈 center horizontally, move slightly up */
  transform: translateX(-20px); /* 👈 shift a bit to left from center */
  display: flex;
  gap: 12px; /* spacing between left/right buttons */
}


.slider-btn {
  background-color: rgba(0, 0, 0, 0.5);
  border: none;
  color: white;
  padding: 8px 10px;
  font-size: 20px;
  cursor: pointer;
  z-index: 10;
  border-radius: 50%;
  transition: transform 0.3s ease, background-color 0.3s;
}

.slider-btn:hover {
  background-color: rgba(0, 0, 0, 0.8);
  transform: scale(1.1);
}








.custom-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: 300px; /* Increased height from 260px */
  gap: 10px; /* Slightly more spacing between tiles */
  max-width: 1300px;
  margin: 0 auto 0 210px; /* Slight left alignment */
}

.custom-tile {
  background: white;
  border-radius: 0 !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  padding: 16px;
  font-size: 16px;
  color: #333;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  position: relative;
  text-align: center;
  border: 2px solid transparent;
}

/* Maintain taller tiles if already using this */
.tile-tall {
  grid-row: span 2;
}

/* Force no border-radius on tile or children */
.custom-tile *,
.custom-tile *::before,
.custom-tile *::after {
  border-radius: 0 !important;
}



.custom-tile:nth-child(1) {
  border: 2px solid rgba(225, 99, 85, 0.3); /* soft red */
}

.custom-tile:nth-child(2) {
  border: 2px solid rgba(0, 122, 255, 0.3); /* soft blue */
}

.custom-tile:nth-child(3) {
  border: 2px solid rgba(0, 198, 255, 0.3); /* soft cyan */
}

.custom-tile:nth-child(4) {
  border: 2px solid rgba(33, 147, 176, 0.3); /* soft ocean blue */
}

.custom-tile:nth-child(5) {
  border: 2px solid rgba(142, 45, 226, 0.3); /* soft purple */
}

.custom-tile:nth-child(6) {
  border: 2px solid rgba(0, 170, 255, 0.3); /* soft teal */
}

.custom-tile:nth-child(7) {
  border: 2px solid rgba(78, 84, 200, 0.3); /* dark gray-blue */
}

.custom-tile:nth-child(8) {
  border: 2px solid rgba(31, 237, 55, 0.3); /* soft green */
}

.custom-tile:nth-child(9) {
  border: 2px solid rgba(255, 88, 89, 0.3); /* soft red-pink */
}

.custom-tile:nth-child(10) {
  border: 2px solid rgba(255, 88, 88, 0.3); /* soft red-orange */
}











.custom-tile.calendar-tile {
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
  padding: 0;
  overflow: hidden;
}

.custom-tile.calendar-tile h3 {
  margin: 0;
  padding: 15px;
  background: linear-gradient(to right, #00aaff, #7b5ba5, #e83e52);
  color: white;
  font-size: 18px;
  text-align: center;
}

.tile-calendar-controls {
  display: flex;
  justify-content: space-between;
  padding: 8px 12px;
  background-color: #e9ecef;
  font-weight: bold;
}

.tile-weekdays {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  background-color: #dee2e6;
  font-weight: bold;
  text-align: center;
  font-size: 14px;
}

.tile-days {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-template-rows: repeat(6, 1fr);
  gap: 2px;
  padding: 12px 6px 6px;
  height: 100%;
  overflow: hidden;
  box-sizing: border-box;
}

.tile-days div {
  background: linear-gradient(145deg, #f0f4ff, #e2e8f0);
  border: 1px solid #cbd5e1;
  font-size: 12px;
  border-radius: 5px;
  display: flex;
  flex-direction: column; /* allow date + holiday name vertically */
  align-items: center;
  justify-content: flex-start;
  padding: 4px 2px;
  height: 100%;
  box-sizing: border-box;
  text-align: center;
  color: #000;
  font-weight: bold;
}

/* Present Day */
.tile-today {
  background-color: #38bdf8 !important;
  border: 2px solid #0284c7;
  color: white !important;
}

/* Holiday Day */
.holiday {
  background-color: #facc15 !important;
  border: 2px solid #eab308;
  color: #000 !important;
}

/* Holiday label below the date */
.holiday-name {
  font-size: 10px;
  margin-top: 4px;
  color: #000;
  font-weight: normal;
  line-height: 1.2;
  text-align: center;
}

/* This makes sure holiday style overrides the default .tile-days div style */
.tile-days div.holiday {
  background-color: #facc15 !important;
  border: 2px solid #eab308 !important;
  color: #000 !important;
}

/* Strong override for present day cell */
.tile-days div.today {
  background:rgb(39, 201, 98) !important;        /* ✅ fully override background */
  border: 2px solidrgb(101, 243, 153) !important;  /* dark green border */
  color: white !important;
  font-weight: bold;
}

/* Sunday style */
.tile-days div.sunday {
  background-color: #fecaca !important;
  border: 2px solidrgb(207, 179, 179) !important;  /* red */
  color:rgb(244, 31, 31);
}

/* 2nd and 4th Saturday style */
.tile-days div.saturday-red {
  background-color: #fcd34d !important;
  border: 2px solidrgb(210, 17, 17) !important;  /* red border */
  color:rgb(211, 16, 97);
}





  /* Thought Tile Container */
/* Thought Tile Container – Styled as a Tile */
.custom-tile.thought-tile {
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
  background: white;
  border-radius: 0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  font-size: 18px;
  color: #333;
  text-align: center;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* Tile Hover Effect */
.custom-tile.thought-tile:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
}

/* Header Fixed at Top */
.thought-tile .tile-header {
background: linear-gradient(to right, #00c6ff, #0072ff);

  color: white;
  font-size: 16px;
  padding: 10px 15px;
  margin: 0;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  border-radius: 16px 16px 0 0;
  flex-shrink: 0;
  text-align: center;
}

/* Empty/Placeholder Content Area (future use) */
.thought-tile .thought-container {
  flex-grow: 1;
  padding: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.thought-container {
  flex-grow: 1;
  padding: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.thought-text {
  font-size: 20px;
  font-style: italic;
  line-height: 1.6;
  color: #333;
}

.thought-author {
  margin-top: 10px;
  font-size: 14px;
  color: #666;
}





/* Word of the Day Tile Styling */
.custom-tile.word-tile {
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
}

.word-tile .tile-header {
background: linear-gradient(to right, #4e54c8, #8f94fb);


  color: white;
  font-size: 16px;
  padding: 10px 15px;
  margin: 0;
  text-align: center;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  border-radius: 8px 8px 0 0;
  flex-shrink: 0;
}

.word-tile .word-container {
  flex-grow: 1;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.word-tile .word {
  font-size: 24px;
  font-weight: bold;
  color: #2c3e50;
  margin-bottom: 10px;
}

.word-tile .definition {
  font-size: 16px;
  color: #555;
  text-align: center;
}





/* Retirement Tile */
/* Retirement Tile Styling */
.custom-tile.retirement-tile {
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
  margin: 0;               /* Ensure no margin */
  border-radius: 8px;      /* Rounded corners for the tile */
  background-color: #fff;
}

/* Header inside the tile */
.retirement-tile .tile-header {
background: linear-gradient(to right, #ff5858, #f09819);

  color: white;
  font-size: 16px;
  padding: 10px 15px;
  margin: 0;                /* Remove margin to avoid vertical spacing */
  text-align: center;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  border-radius: 8px 8px 0 0; /* Rounded only at top */
  flex-shrink: 0;
  line-height: 1.4;
}

/* Container for retirement user cards */
.retirement-tile .retirement-container {
  flex-grow: 1;
  padding: 20px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 10px;
}


.retirement-card {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #f5f5f5;
  padding: 12px;
  border-radius: 12px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.retirement-card img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
}

.retirement-text {
  flex-grow: 1;
  text-align: left;
  font-size: 14px;
}

.retire-msg {
  color: #2e8b57;
  font-weight: bold;
}

.wish-button {
  background-color: #1abc9c;
  border: none;
  color: white;
  padding: 6px 12px;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.wish-button:hover {
  background-color: #16a085;
}





/* ED's Desk Tile Styling */
/* ED's Desk Tile Styling */
.custom-tile.ed-tile {
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
  border-radius: 8px;
  background-color: #ffffff;
}

/* Header Styling */
.ed-tile .tile-header {
  background: linear-gradient(to right, #ff5858, #f09819);


  color: white;
  font-size: 16px;
  padding: 10px 15px;
  margin: 0;
  text-align: center;
  font-weight: bold;
  width: 100%;
  box-sizing: border-box;
  border-radius: 8px 8px 0 0;
  flex-shrink: 0;
}

/* 🔹 70% centered separator line */
.ed-tile .ed-separator {
  width: 70%;
  height: 1px;
  background-color: #ccc;
  margin: 10px auto; /* centers the line horizontally */
}

/* Message Body */
.ed-tile .ed-message {
  flex-grow: 1;
  padding: 20px;
  font-size: 15px;
  color: #333;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}





/* ===== NEWS TILE (inherits .custom-tile & .tile-tall) ===== */
.custom-tile.news-tile {
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
  padding: 0;
  overflow: hidden;
  height: 100%; /* fills full .tile-tall */
  display: flex;
  background: white;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

/* News Heading */
.custom-tile.news-tile h3 {
  margin: 0;
  padding: 15px;
 background: linear-gradient(to right,rgb(31, 237, 55),rgba(196, 211, 33, 0.85));

  color: white;
  font-size: 18px;
  text-align: center;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
}

/* Scroll container becomes static container now */
.tile-news-scroll {
  flex: 1;
  overflow-y: auto;
  padding: 12px 16px;
  box-sizing: border-box;

  /* Hide scrollbar (cross-browser) */
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* IE/Edge */

}
.tile-news-scroll::-webkit-scrollbar {
  display: none; /* Chrome/Safari */
}


/* News item styled as a mini card */
.news-item {
  display: flex;
  gap: 12px;
  background: #f8f9fa;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
  align-items: center;
}

.news-item img {
  width: 48px;
  height: 48px;
  border-radius: 6px;
  object-fit: cover;
  background: #ccc;
  flex-shrink: 0;
}

.news-text {
  flex: 1;
  overflow: hidden;
}

.news-text a {
  font-size: 15px;
  font-weight: 600;
  color: #007bff;
  text-decoration: none;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: block;
}

.news-text a:hover {
  text-decoration: underline;
}

.news-text p {
  font-size: 13px;
  margin-top: 4px;
  color: #444;
  line-height: 1.4;
}


   .banner {
  position: relative;
  margin-left: 210px;                  /* sidebar width */
  margin-top: 15px;                    /* 👈 light gap on top */
  width: calc(100% - 220px);
  height: 320px;
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-template-rows: repeat(2, 1fr);
  overflow: hidden;
}


    .banner img.bg {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: blur(0.5px); /* 👈 हल्का blur */
  transform: scale(1.02);
}

    .grid-item {
      width: 100%;
      height: 100%;
    }

    .overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.2); /* mild overlay */
      z-index: 1;
    }

  .text-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  color: #fff;
  text-align: center;
  width: 100%;
  max-width: 1200px;     /* 👈 Makes sure text doesn't overflow */
  padding: 0 40px;        /* 👈 Adds horizontal breathing space */
}

.text-content h1 {
  font-size: 2.2rem;       /* 👈 Increased font size */
  line-height: 1;        /* 👈 More vertical space between lines */
  font-weight: 600;
  white-space: pre-line;   /* 👈 Ensures line breaks are respected */
}


    .highlight-orange { color:rgb(13, 189, 224); }
    .highlight-blue   { color:rgb(24, 220, 89); }
    .highlight-yellow { color: #ffe600; font-weight: bold; }

    .footer-bar {
  margin-top: 20px;
  background: #1e1e1e;
  color: #bbb;
  font-size: 0.85em;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 25px 30px; /* Increased vertical padding from 15px to 25px */
  flex-wrap: wrap;
}


    .footer-links a {
      margin-right: 15px;
      text-decoration: none;
      color: #bbb;
    }

    .footer-links a:hover {
      color: white;
    }

    .social-icons img {
      height: 22px;
      width: 22px;
      margin-left: 10px;
      vertical-align: middle;
    }

    @media (max-width: 768px) {
      .banner {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(5, 1fr);
        height: 500px;
      }

      .text-content h1 {
        font-size: 1.2rem;
      }

      .footer-bar {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: #1e1e1e;
  color: #bbb;
  font-size: 0.85em;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 30px;
  flex-wrap: wrap;
  z-index: 99999; /* Higher than anything else */
  box-shadow: 0 -2px 8px rgba(0,0,0,0.3);
  pointer-events: auto; /* Ensures it gets mouse events */
}

    }










</style>

</head>
<body>

  <!-- Docs Modal -->
  <div 
 class="modal-backdrop" id="modalBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>Docs (दस्तावेज)</h3>
      <a href="pdf/OMI Mar23_FY23.pdf">OMI 2023</a>
      <a href="#">Test</a>
    </div>
  </div>

  <!-- Int.Assgn Modal -->
  <div class="modal-backdrop" id="assignBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>Int.Assgn (आंतरिक कार्यभार)</h3>
      <a href="#">СТЕВ</a>
      <a href="#">U & S</a>
      <a href="#">nt Events L</a>
      <a href="#">MECHANICAL</a>
      <a href="#">CIVIL & STRUCTURAL</a>
      <a href="#">ELECTRICAL</a>
      <a href="#">PCA</a>
    </div>
  </div>

  <!-- ISO Modal -->
  <div class="modal-backdrop" id="isoBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>ISO & Stdns</h3>
      <a href="#">Acceptable Make List</a>
      <a href="#">NUAI</a>
      <a href="#">CET Procedure manual</a>
      <a href="#">Nominated Members in BIS Technical Committee</a>
      <a href="#">Protocol for attending BIS TC meeting/Training</a>
      <a href="#">Vendor Evaluation Procedure</a>
      <a href="#">ISO 9001:2015 QMS certificate</a>
      <a href="#">CET Vision</a>
      <a href="#">PF DE</a>
      <a href="#">Quality Policy of CET</a>
      <a href="#">Basis of engg hrs estimation</a>
      <a href="#">Standardisation Manual</a>
      <a href="#">Standard Bidding Document</a>
      <a href="#">CET Quality Manual</a>
      <a href="#">Context of the organization.</a>
      <a href="#">Needs & expectations of interested parties</a>
      <a href="#">Opportunities & action plan</a>
      <a href="#">Risk assessment & contingency plan</a>
    </div>
  </div>

  <!-- Links Modal -->
  <div class="modal-backdrop" id="linksBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>Links (कढ़ी)</h3>
      <a href="#">Personnel Manual</a>
      <a href="#">MTI PORTAL</a>
      <a href="#">EPMS (new)</a>
      <a href="#">Vigilance Integrity Pledge</a>
      <a href="#">IPSS</a>
      <a href="#">SAIL PENSION PORTAL - INTERNET</a>
      <a href="#">SAIL Corporate Office Portal</a>
      <a href="#">DSP PORTAL</a>
      <a href="#">BSL PORTAL</a>
      <a href="#">BSP PORTAL</a>
      <a href="#">E-Abhigyan</a>
      <a href="#">SAIL Vigilance</a>
      <a href="#">ISP PORTAL</a>
      <a href="#">SSO PORTAL</a>
      <a href="#">RSP PORTAL</a>
      <a href="#">CMO PORTAL</a>
      <a href="#">SAIL TENDERS</a>
      <a href="#">RDCIS PORTAL</a>
      <a href="#">Rate Contract management System</a>
      <a href="#">CET-SA</a>
      <a href="#">EPMS OLD</a>
      <a href="#">Conference Booking</a>
    </div>
  </div>

  <!-- Templates Modal -->
  <div class="modal-backdrop" id="templatesBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>Templates (साँचा)</h3>
      <a href="#">Clauses related to free issue of steel in item rate contract</a>
      <a href="#">TurnKey TS</a>
      <a href="#">C&S Standard Item Rate TS</a>
      <a href="#">Approach Note</a>
      <a href="#">Standard TS - UG Mapping</a>
      <a href="#">Presentation Template</a>
      <a href="#">Feasibility Report</a>
      <a href="#">EC With Consortium</a>
      <a href="#">EC Without Consortium</a>
      <a href="#">TER CheckList</a>
      <a href="#">TER Format</a>
      <a href="#">Standard TS - NDT</a>
      <a href="#">Standard TS - SIS</a>
      <a href="#">* RECORD NOTES FORMAT</a>
      <a href="#">MOM FORMAT</a>
    </div>
  </div>

  <!-- Misc Modal -->
  <div class="modal-backdrop" id="miscBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>Misc (विविध)</h3>
      <a href="#">Whistle Blower Mechanism in SAIL</a>
      <a href="#">Empaneled Hotel 2023</a>
      <a href="#">PF NOMINATION</a>
      <a href="#">PF MEMBERSHIP</a>
      <a href="#">PF TRANSFER</a>
      <a href="#">SAIL NEWS MAY 24</a>
      <a href="#">MoU with Banks</a>
      <a href="#">Revised SAIL TA Rules</a>
      <a href="#">CET e-Mail IDs - NIC (sail.in)</a>
      <a href="#">Time sheet Manual-EDDMS</a>
      <a href="#">PCP-2024</a>
      <a href="#">Holidays List 2025</a>
      <a href="#">Integrity Pledge</a>
      <a href="#">VPF FORM</a>
      <a href="#">Vigilance Do and Dont</a>
      <a href="#">MOBILE REIMBURSEMENT</a>
      <a href="#">Anti-Bribery-Notice</a>
      <a href="#">Awareness-on-PIDPI</a>
      <a href="#">CVC Clip VAW</a>
      <a href="#">Search SAIL Employee</a>
      <a href="#">ORGAN DONATION PLEDGE</a>
    </div>
  </div>

  <!-- Manjusa Modal -->
  <div class="modal-backdrop" id="manjusaBackdrop" onclick="closePanels()">
    <div class="docs-modal" onclick="event.stopPropagation()">
      <button class="close-btn" onclick="closePanels()">×</button>
      <h3>मंजूषा</h3>
      <a href="#">कविता (प्रतिनिधि)</a>
      <a href="#">कविता (हरिवंशराय बच्चन)</a>
      <a href="#">कविता</a>
      <a href="#">पत्थर कविता</a>
      <a href="#">कहानी</a>
      <a href="#">राजभाषा संविधान</a>
      <a href="#">राजभाषा नीति</a>
      <a href="#">तकनीकी लेख</a>
      <a href="#">विद्युत शब्दावली</a>
      <a href="#">यादों की बारा</a>
    </div>
  </div>

  <header>
    <div class="left-logo" onclick="toggleLogoPanel()" style="cursor:pointer;">
  <img
    src="images/orig.PNG"
    alt="SAIL CET Logo"
  />
</div>

    <nav class="navbar">
      <a href="#" onclick="toggleDocsModal()">Docs (दस्तावेज)</a>
      <a href="#" onclick="toggleAssignModal()">Int.Assgn (आंतरिक कार्यभार)</a>
      <a href="#" onclick="toggleIsoModal()">ISO & Stdns</a>
      <a href="#" onclick="toggleLinksModal()">Links (कढ़ी)</a>
      <a href="#" onclick="toggleTemplatesModal()">Templates (साँचा)</a>
      <a href="#" onclick="toggleMiscModal()">Misc (विविध)</a>
      <a href="#" onclick="toggleManjusaModal()">मंजूषा</a>
    </nav>
    <div class="header-actions">
      <button class="header-btn" title="Notifications" onclick="alert('No new notifications')">
        🔔
      </button>
      <button class="header-btn" title="Settings" onclick="toggleSettingsPanel()">
        ⚙️
      </button>
    </div>
  </header>




        <!-- BEGIN SIDEBAR -->
        <div class="sidebar-scroll">
            <div id="sidebar" class="nav-collapse collapse">
                <div class="profile-sec">
                    
                    <div class="text-center mb-10px">
                        <img src="images/kala.jpg" alt="KUNDAN KUMAR DIWAKAR" title="KUNDAN KUMAR DIWAKAR" style="width: 50px; height: 50px;">
                    </div>

                    <div class="nav" style="margin-bottom: 0!important">
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="text-center">
                                    <span class="username">KUNDAN KUMAR DIWAKAR</span>
                                    <b class="caret"></b>
                                </div>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="Profile_Contact.aspx"><i class="icon-user"></i>My Profile</a></li>
                                <li><a href="Addpwd.aspx"><i class="icon-envelope"></i>Email Setup</a></li>
                                <li><a href="Changepwd.aspx"><i class="icon-cog"></i>Change Password</a></li>

                                <li><a href="Logout.php"><i class="icon-key"></i>Log Out</a></li>
                            </ul>
                        </div>
                        <!-- END USER LOGIN DROPDOWN -->
                    </div>
                </div>

                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="navbar-inverse">
                    <form class="navbar-search visible-phone">
                        <input type="text" class="search-query" placeholder="Search" />
                    </form>
                </div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="sidebar-menu">
        <li><a href="./">Dashboard</a></li>
        <li><a href="super_admin.aspx">Super Admin</a></li>
        <li><a href="admin_panel.aspx">Admin Panel</a></li>
        <li class="btn">SailCet</li>
        <li><a href="list_alerts.aspx">ALERTS & REPORTS</a></li>
        <li><a href="list_costdb.aspx">COST DB</a></li>
        <li><a href="SearchEmp.aspx">CONTACT DETAILS</a></li>
        <li><a href="list_docs.aspx">DOCUMENT SHARE</a></li>
        <li><a href="list_edmsg.aspx">ED MESSAGE</a></li>
        <li><a href="list_planner.aspx">ED MONTHLY PLANNER</a></li>
        <li><a href="list_gallery.aspx">GALLERY</a></li>
        <li><a href="list_group.aspx">GROUP CREATION</a></li>
        <li><a href="SendMsg.aspx">GROUP MESSAGES</a></li>
        <li><a href="list_home_slider.aspx">HOME PAGE SLIDER</a></li>
        <li><a href="list_schedule.aspx">IMPORTANT SCHEDULE</a></li>
        <li><a href="add_km.aspx">KM MODULE</a></li>
      
       
    </ul>

                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        
        <!-- END SIDEBAR -->
         
  <div class="side-panel" id="settingsPanel">
    <h3>Settings</h3>
    <a href="#">Profile</a>
    <a href="#">Preferences</a>
    <a href="#">Logout</a>
  </div>

  <div class="side-panel left-panel" id="logoPanel">
  <h3>Profile</h3>
  <a href="#">My Profile</a>
  <a href="#">Email Setup</a>
  <a href="#">Change Password</a>
    <a href="logout.php"> logout</a>
</div>



<!-- ✅ Place marquee box OUTSIDE, below the video-wrapper -->
<div class="important-events-wrapper">
  
  <div class="events-message-box">
    <marquee>🚀 New product launch on 25th June • 🎯 Quarterly Review Meeting on 30th June • 🎉 Hackathon begins 10th July</marquee>
  </div>
</div>


 
    <!-- Main content can go here -->
     <!-- Wrapper for the entire Important Events section -->
 <!-- Important Events Section -->
 

    
  
<div class="video-wrapper">
  <video src="videos/work.mp4" autoplay muted loop></video>

  
  <div class="video-overlay-title fade-top fade-delay-1">
    <div class="main-title">SERVICES / CONSULTING</div>
    <div class="underline fade-top fade-delay-2"></div>

    <div class="overlay-subtext fade-top fade-delay-3">
      Your Purpose, Our Strategies
    </div>

    <div class="overlay-description">
      <div class="line line1 fade-top fade-delay-4">
        We provide end-to-end digital solutions.
      </div>
      <div class="line line2 fade-top fade-delay-5">
        Helping you innovate, grow, and lead
      </div>
      <div class="line line3 fade-top fade-delay-6">
        in your sector.
      </div>

      <div class="arrow-sign fade-top fade-delay-6">↓</div>

      <button class="chat-button fade-top fade-delay-6" onclick="openChatbot()">
        Let's Talk
      </button>
    </div>
  </div>
  
</div>
</div>



<div class="section-separator">Explore</div>








<div class="tile-slider-container">
  <div class="tile-slider-wrapper">
    <div class="tile-slider-pages" id="tileSliderPages">
      <!-- JS will inject tile pages here -->
    </div>
  </div>

  <!-- ✅ Navigation buttons moved below inside new wrapper -->
  <div class="slider-btn-wrapper">
    <button class="slider-btn" id="sliderBtnLeft">&#10094;</button>
    <button class="slider-btn" id="sliderBtnRight">&#10095;</button>
  </div>
</div>




  <div class="custom-grid">


   <div class="custom-tile alerts-tile">
  <h3 class="tile-header"> 🔔 Alerts & Reports</h3>
  <div class="alert-list">
    <?php
      $conn = new mysqli("localhost", "root", "", "login");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT title, author, link, date FROM alerts_reports ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="alert-item">';
              echo '  <div class="alert-icon">🔔</div>';
              echo '  <div class="alert-content">';
              echo '    <a href="' . htmlspecialchars($row["link"]) . '" target="_blank">' . htmlspecialchars($row["title"]) . '</a>';
              echo '    <div class="alert-meta">BY: ' . htmlspecialchars($row["author"]) . '  Date: ' . htmlspecialchars($row["date"]) . '</div>';
              echo '  </div>';
              echo '</div>';
          }
      } else {
          echo "<p>No alerts found.</p>";
      }

      $conn->close();
    ?>
  </div>
</div>


    
   <div class="custom-tile alerts-tile">
  <h3 class="tile-header"> 🔔 Notices & Circular</h3>
  <div class="alert-list">
    <?php
      $conn = new mysqli("localhost", "root", "", "login");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT title, author, link, date FROM alerts_reports ORDER BY date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="alert-item">';
              echo '  <div class="alert-icon">🔔</div>';
              echo '  <div class="alert-content">';
              echo '    <a href="' . htmlspecialchars($row["link"]) . '" target="_blank">' . htmlspecialchars($row["title"]) . '</a>';
              echo '    <div class="alert-meta">BY: ' . htmlspecialchars($row["author"]) . '  Date: ' . htmlspecialchars($row["date"]) . '</div>';
              echo '  </div>';
              echo '</div>';
          }
      } else {
          echo "<p>No alerts found.</p>";
      }

      $conn->close();
    ?>
  </div>
</div>

<div class="custom-tile tile-tall calendar-tile">
  <h3>📅 Calendar/Scheduler</h3>
  <div class="tile-calendar-controls">
    <button onclick="goToPrevMonth()">‹</button>
    <span id="tile-month-year"></span>
    <button onclick="goToNextMonth()">›</button>
  </div>
  <div class="tile-weekdays">
    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div>
    <div>Thu</div><div>Fri</div><div>Sat</div>
  </div>
  <div class="tile-days" id="tile-calendar-days"></div>
</div>




<div class="custom-tile group-message-tile">
  <h3 class="tile-header">💬 Group Message</h3>

  <div class="message-list">
    <?php
    // Check session before using it
    if (!isset($_SESSION["username"])) {
        echo '<div class="message-item">⚠️ Please login to send or view messages.</div>';
    } else {
        $conn = new mysqli("localhost", "root", "", "login");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT sender, message, timestamp FROM group_messages ORDER BY timestamp ASC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $isOwn = ($row["sender"] === $_SESSION["username"]);
                if ($isOwn) {
                    echo '<div class="message-bubble own-message">';
                    echo '<div class="message-text">' . htmlspecialchars($row["message"]) . '</div>';
                    echo '<div class="message-time">' . date("h:i A", strtotime($row["timestamp"])) . '</div>';
                    echo '</div>';
                } else {
                    $sender = htmlspecialchars($row["sender"]);
                    $parts = explode(" ", $sender);
                    $initials = strtoupper(substr($parts[0], 0, 1));
                    if (isset($parts[1])) {
                        $initials .= strtoupper(substr($parts[1], 0, 1));
                    }

                    echo '<div class="message-item other-message">';
                    echo '<div class="avatar">' . $initials . '</div>';
                    echo '<div class="bubble-container">';
                    echo '<div class="message-sender">' . $sender . '</div>';
                    echo '<div class="message-text">' . htmlspecialchars($row["message"]) . '</div>';
                    echo '<div class="message-time">' . date("h:i A", strtotime($row["timestamp"])) . '</div>';
                    echo '</div></div>';
                }
            }
        } else {
            echo '<div class="message-item">No messages yet.</div>';
        }
        $conn->close();
    }
    ?>
  </div>

  <div class="message-input-area">
    <form action="send_message.php" method="POST" style="display: flex; width: 100%;">
      <input type="text" name="message" class="message-input" placeholder="Type a message..." required>
      <button type="submit" class="send-button">Send</button>
    </form>
  </div>
</div>






   <div class="custom-tile birthday-tile">
  <h3 class="tile-header">🎂 Birthdays Today</h3>
  <div class="birthday-container">
    <div class="birthday-slider">
     <?php
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = date("m-d");
$sql = "SELECT name, designation, photo FROM users WHERE DATE_FORMAT(dob, '%m-%d') = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

$birthdayCards = [];

if ($result->num_rows > 0) {
    // Store all rows first
    while ($row = $result->fetch_assoc()) {
        $birthdayCards[] = $row;
    }

    // Merge original and copy for smooth loop
    $loopedCards = array_merge($birthdayCards, $birthdayCards);

    foreach ($loopedCards as $row) {
        echo '<div class="birthday-card">';
        echo '  <img src="' . (!empty($row['photo']) ? $row['photo'] : 'default-user.png') . '" alt="Profile">';
        echo '  <div class="birthday-text">';
        echo '    <strong style="color:green">CET wishes</strong><br>';
        echo '    <span class="name">' . strtoupper($row["name"]) . '</span><br>';
        echo '    <span class="designation">' . strtoupper($row["designation"]) . '</span><br>';
        echo '    <span class="birthday-msg">a Happy Birthday</span>';
        echo '  </div>';
        echo '  <button class="wish-button">Wish</button>';
        echo '</div>';
    }
} else {
    echo '<p style="text-align:center; color:gray;">No birthdays today</p>';
}

$stmt->close();
$conn->close();
?>

    </div>
  </div>
</div>


  <div class="custom-tile thought-tile">
  <h3 class="tile-header">🧠 Thought of the Day</h3>
  <div class="thought-container">
    <?php
    $conn = new mysqli("localhost", "root", "", "login");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $today = date("Y-m-d");
    $sql = "SELECT quote, author FROM thoughts WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $today);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="thought-card">';
        echo '  <q class="thought-text">' . htmlspecialchars($row['quote']) . '</q>';
        echo '  <div class="thought-author"><strong>' . htmlspecialchars($row['author']) . '</strong></div>';
        echo '</div>';
    } else {
        echo '<p style="color: gray;">No thought available for today.</p>';
    }

    $stmt->close();
    $conn->close();
    ?>
  </div>
</div>



    <div class="custom-tile word-tile">
  <h3 class="tile-header">📘 Word of the Day</h3>
  <div class="word-container">
    <!-- Word content will go here -->
    <p class="word">SERENDIPITY</p>
    <p class="definition">The occurrence of events by chance in a happy or beneficial way.</p>
  </div>
</div>

    <!--  NEWS TILE  (big / tile-tall)  -->
<div class="custom-tile news-tile tile-tall">
  <h3><i class="fas fa-newspaper"></i> News</h3>
  <div class="tile-news-scroll">
    <!-- 10 News Items -->
    <div class="news-item">
      <img src="news1.jpg" alt="">
      <div class="news-text">
        <a href="#">SAIL sets record 1.72 MT crude steel output in Jan</a>
        <p>Company achieves historic monthly production across key plants.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news2.jpg" alt="">
      <div class="news-text">
        <a href="#">Bhilai Steel Plant exceeds plate production target</a>
        <p>Massive orders from Indian Railways boost FY23 performance.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news3.jpg" alt="">
      <div class="news-text">
        <a href="#">Rourkela Steel Plant installs AI-based monitoring</a>
        <p>Real-time furnace tracking improves energy efficiency by 11%.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news4.jpg" alt="">
      <div class="news-text">
        <a href="#">Durgapur Plant wins National Safety Award 2024</a>
        <p>Recognized for zero accidents in high-risk operation zones.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news5.jpg" alt="">
      <div class="news-text">
        <a href="#">SAIL launches new HR policy for workforce welfare</a>
        <p>Policy includes flexible work hours, upskilling programs, and housing.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news6.jpg" alt="">
      <div class="news-text">
        <a href="#">IISCO Steel Plant begins digital transformation phase</a>
        <p>Integration of SAP HANA and IoT sensors across mill operations.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news7.jpg" alt="">
      <div class="news-text">
        <a href="#">SAIL organizes International Steel Tech Summit</a>
        <p>Experts from 22 countries gathered to discuss clean steelmaking.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news8.jpg" alt="">
      <div class="news-text">
        <a href="#">SAIL-RDCIS patents energy-saving rolling technique</a>
        <p>Technology expected to cut cost by 8% across hot strip mills.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news9.jpg" alt="">
      <div class="news-text">
        <a href="#">Steel exports cross 2.4M tonnes in Q1 FY25</a>
        <p>Driven by increased demand in Southeast Asia and Europe.</p>
      </div>
    </div>
    <div class="news-item">
      <img src="news10.jpg" alt="">
      <div class="news-text">
        <a href="#">SAIL adopts green hydrogen pilot at Rourkela</a>
        <p>First-of-its-kind hydrogen-based steel furnace commissioned.</p>
      </div>
    </div>
  </div>
</div>




<div class="custom-tile ed-tile">
  <div class="tile-header">✉️ ED's DESK</div>
  <div class="ed-separator"></div>
  <div class="ed-message">
    <p>Welcome to CET! Let's work together and grow stronger. 🚀</p>
  </div>
</div>


   <div class="custom-tile retirement-tile">
  <h3 class="tile-header">🎉 Retirement This Month</h3>
  <div class="retirement-container">
    <?php
    $conn = new mysqli("localhost", "root", "", "login");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $currentDate = date("Y-m-d");
    $currentMonth = date("m");
    $currentYear = date("Y");

    $sql = "SELECT name, designation, photo, dob FROM users";
    $result = $conn->query($sql);

    $found = false;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dob = $row['dob'];
            $retirementDate = date("Y-m-d", strtotime("+50 years", strtotime($dob)));
            $retirementMonth = date("m", strtotime($retirementDate));
            $retirementYear = date("Y", strtotime($retirementDate));

            // Show only if retirement is this month AND this year AND the user has turned 50 (date reached)
            if ($retirementMonth === $currentMonth && $retirementYear === $currentYear && $retirementDate <= $currentDate) {
                $found = true;

                echo '<div class="retirement-card">';
                echo '  <img src="' . (!empty($row['photo']) ? $row['photo'] : 'default-user.png') . '" alt="Profile">';
                echo '  <div class="retirement-text">';
                echo '    <strong style="color:#c0392b;">SAIL CET Wishes</strong><br>';
                echo '    <span class="name">' . strtoupper($row["name"]) . '</span><br>';
                echo '    <span class="designation">' . strtoupper($row["designation"]) . '</span><br>';
                echo '    <span class="retire-msg">a Happy Retirement!</span>';
                echo '  </div>';
                echo '  <button class="wish-button">Wish</button>';
                echo '</div>';
            }
        }
    }

    if (!$found) {
        echo '<p style="text-align:center; color:gray;">No retirements this month</p>';
    }

    $conn->close();
    ?>
  </div>
</div>

  </div>


<!-- Footer Start -->
<div class="banner">
    <!-- Background Images -->
    <div class="grid-item"><img class="bg" src="images/sail2.jpeg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail3.png" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail1.jpg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail1.jpg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail4.jpeg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail5.jpeg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail1.jpg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail4.jpeg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail2.jpeg" alt=""></div>
    <div class="grid-item"><img class="bg" src="images/sail3.png" alt=""></div>

    <div class="overlay"></div>

    <div class="text-content">
      <h1>
  A <span class="highlight-orange">Great Place to Work-Certified™</span> organisation,<br>
  we are spread across <span class="highlight-blue">globe</span> with an employee<br>
  base of over <span class="highlight-yellow">77,000</span>.
</h1>

    </div>
  </div>
 <!-- 🔗 Footer -->
  <div class="footer-bar">
    <div class="footer-links">
      <a href="#">Disclaimer</a> |
      <a href="#">Privacy Policy</a> |
      <a href="#">Cookie Policy</a> |
      <a href="#">Sitemap</a>
    </div>

    <div class="social-icons">
      FOLLOW US ON:
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/5968/5968958.png" alt="X"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram"></a>
    </div>
  </div>





 


<script>
 
    const modalBackdrop = document.getElementById("modalBackdrop");
    const assignBackdrop = document.getElementById("assignBackdrop");
    const isoBackdrop = document.getElementById("isoBackdrop");
    const linksBackdrop = document.getElementById("linksBackdrop");
    const templatesBackdrop = document.getElementById("templatesBackdrop");
    const miscBackdrop = document.getElementById("miscBackdrop");
    const manjusaBackdrop = document.getElementById("manjusaBackdrop");
    const settingsPanel = document.getElementById("settingsPanel");

    function toggleDocsModal() {
      const isVisible = modalBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) modalBackdrop.classList.add("show");
    }

    function toggleAssignModal() {
      const isVisible = assignBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) assignBackdrop.classList.add("show");
    }

    function toggleIsoModal() {
      const isVisible = isoBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) isoBackdrop.classList.add("show");
    }

    function toggleLinksModal() {
      const isVisible = linksBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) linksBackdrop.classList.add("show");
    }

    function toggleTemplatesModal() {
      const isVisible = templatesBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) templatesBackdrop.classList.add("show");
    }

    function toggleMiscModal() {
      const isVisible = miscBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) miscBackdrop.classList.add("show");
    }

    function toggleManjusaModal() {
      const isVisible = manjusaBackdrop.classList.contains("show");
      closePanels();
      if (!isVisible) manjusaBackdrop.classList.add("show");
    }

    function toggleSettingsPanel() {
      const isOpen = settingsPanel.classList.contains("open");
      closePanels();
      if (!isOpen) settingsPanel.classList.add("open");
    }

    const logoPanel = document.getElementById("logoPanel");

function toggleLogoPanel() {
  const isOpen = logoPanel.classList.contains("open");
  closePanels();
  if (!isOpen) logoPanel.classList.add("open");
}


    function closePanels() {
  modalBackdrop.classList.remove("show");
  assignBackdrop.classList.remove("show");
  isoBackdrop.classList.remove("show");
  linksBackdrop.classList.remove("show");
  templatesBackdrop.classList.remove("show");
  miscBackdrop.classList.remove("show");
  manjusaBackdrop.classList.remove("show");
  settingsPanel.classList.remove("open");
  logoPanel.classList.remove("open");  // close left panel too
}
// Close side panel if clicked outside of it
document.addEventListener('click', function(event) {
  const settingsPanel = document.getElementById('settingsPanel');
  const logoPanel = document.getElementById('logoPanel');  // If you added this for the logo side panel
  const target = event.target;

  // If the settings panel is open AND click is outside the panel, close it
  if (settingsPanel.classList.contains('open') && !settingsPanel.contains(target) && !event.target.closest('.header-btn')) {
    closePanels();
  }

  // If you have a logoPanel and want same behavior:
  if (logoPanel && logoPanel.classList.contains('open') && !logoPanel.contains(target) && !event.target.closest('.left-logo')) {
    closePanels();
  }
});

    document.addEventListener('DOMContentLoaded', () => {
        const menuLinks = document.querySelectorAll('.sidebar-menu li a');

        menuLinks.forEach(link => {
            link.addEventListener('click', function () {
                // Remove active class from all
                document.querySelectorAll('.sidebar-menu .sub-menu').forEach(li => li.classList.remove('active'));
                
                // Add active to clicked
                if (this.parentElement.classList.contains('sub-menu')) {
                    this.parentElement.classList.add('active');
                }
            });
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
        const currentUrl = window.location.pathname;
        const links = document.querySelectorAll(".sidebar-menu li a");

        links.forEach(link => {
            if (link.getAttribute("href") === currentUrl) {
                link.parentElement.classList.add("active");
                link.style.backgroundColor = "#00b4d8";
                link.style.color = "#fff";
            }
        });
    });






  const tileData = [
  { title: "PAY SLIP", icon: "fas fa-file-invoice-dollar", link: "https://cetapps.in/webportal/u_pnl/PaySlip.aspx", color: "#1abc9c", iconColor: "#f39c12" },
  { title: "PF DETAILS", icon: "fas fa-piggy-bank", link: "pf-details.html", color: "#2ecc71", iconColor: "#e74c3c" },
  { title: "SESBF DETAILS(2022-2023)", icon: "fas fa-coins", link: "ta-payment.html", color: "#3498db", iconColor: "#f1c40f" },
  { title: "EX EMPLOYEE", icon: "fas fa-user-times", link: "gallery.html", color: "#9b59b6", iconColor: "#ec7063" },
  { title: "TA PAYMENT DETAILS", icon: "fas fa-wallet", link: "reports.html", color: "#34495e", iconColor: "#1abc9c" },
  { title: "DEPARTMENTS", icon: "fas fa-building", link: "ex-employee.html", color: "#16a085", iconColor: "#3498db" },
  { title: "IMAGE GALLERY", icon: "fas fa-image", link: "leave.html", color: "#27ae60", iconColor: "#f39c12" },
  { title: "VIDEO GALLERY", icon: "fas fa-video", link: "salary.html", color: "#2980b9", iconColor: "#e67e22" },
  { title: "POST ARTICLE FOR MINDSET", icon: "fas fa-lightbulb", link: "service-book.html", color: "#8e44ad", iconColor: "#f1c40f" },
  { title: "DISCUSSION FORUM", icon: "fas fa-comments", link: "loan.html", color: "#2c3e50", iconColor: "#ec7063" },
  { title: "PMS", icon: "fas fa-chart-line", link: "form16.html", color: "#e67e22", iconColor: "#2ecc71" },
  { title: "LEAVE/TOUR INFORMATION", icon: "fas fa-plane-departure", link: "gsli.html", color: "#e74c3c", iconColor: "#3498db" },
  { title: "E-DOCMAN", icon: "fas fa-folder-open", link: "pay-slip.html", color: "#1abc9c", iconColor: "#9b59b6" },
  { title: "TRANNING", icon: "fas fa-chalkboard-teacher", link: "pf-details.html", color: "#2ecc71", iconColor: "#8e44ad" },
  { title: "LIBRARY", icon: "fas fa-book-reader", link: "ta-payment.html", color: "#3498db", iconColor: "#f39c12" },
  { title: "KNOWN YOUR COLLEAGUES", icon: "fas fa-users", link: "gallery.html", color: "#9b59b6", iconColor: "#2ecc71" },
  { title: "SERVICE DESK", icon: "fas fa-concierge-bell", link: "reports.html", color: "#34495e", iconColor: "#e67e22" },
  { title: "ANTI-BRIBERY MANAGEMENT SYSTEM ", icon: "fas fa-shield-alt", link: "ex-employee.html", color: "#16a085", iconColor: "#e74c3c" },
  { title: "VENDORS'S CARDS", icon: "fas fa-id-card", link: "leave.html", color: "#27ae60", iconColor: "#2980b9" },
  { title: "WEB MAIL", icon: "fas fa-envelope-open-text", link: "salary.html", color: "#2980b9", iconColor: "#16a085" },
  { title: "TELEPHONE DIRECTORY", icon: "fas fa-address-book", link: "service-book.html", color: "#8e44ad", iconColor: "#2c3e50" },
  { title: "ARCHIVES", icon: "fas fa-archive", link: "loan.html", color: "#2c3e50", iconColor: "#f1c40f" },
  { title: "KM", icon: "fas fa-book-open", link: "form16.html", color: "#e67e22", iconColor: "#1abc9c" },
  { title: "OLD COST DB", icon: "fas fa-database", link: "gsli.html", color: "#e74c3c", iconColor: "#34495e" },
  { title: "SHARE DOCUMENTS", icon: "fas fa-share-square", link: "pay-slip.html", color: "#1abc9c", iconColor: "#f39c12" },
  { title: "VENDOR EVALUATION DB", icon: "fas fa-tasks", link: "pf-details.html", color: "#2ecc71", iconColor: "#8e44ad" },
  { title: "COST DB MANAGEMENT", icon: "fas fa-cogs", link: "ta-payment.html", color: "#3498db", iconColor: "#f1c40f" },
  { title: "RAIL CONTRACT", icon: "fas fa-train", link: "gallery.html", color: "#9b59b6", iconColor: "#ec7063" },
  { title: "eWORK", icon: "fas fa-laptop-code", link: "reports.html", color: "#34495e", iconColor: "#27ae60" },
  { title: "MESSAGE", icon: "fas fa-comment-dots", link: "ex-employee.html", color: "#16a085", iconColor: "#e67e22" },
  { title: "11 MONTH PERK RELIEF", icon: "fas fa-percentage", link: "leave.html", color: "#27ae60", iconColor: "#2980b9" },
  { title: "STEELMINT REPORTS", icon: "fas fa-newspaper", link: "salary.html", color: "#2980b9", iconColor: "#2ecc71" }
];

const tileContainer = document.getElementById('tileSliderPages');
const leftBtn = document.getElementById('sliderBtnLeft');
const rightBtn = document.getElementById('sliderBtnRight');
const tilesPerPage = 15;  // ✅ FIXED: 5 cols × 3 rows

const totalTiles = tileData.length;
const pageCount = 3;//Math.ceil(totalTiles / tilesPerPage);
let currentIndex = 0;

for (let i = 0; i < pageCount; i++) {
  const page = document.createElement('div');
  page.className = 'tile-page';

  for (let j = 0; j < tilesPerPage; j++) {
    const tileIndex = i * tilesPerPage + j;
    if (tileIndex >= totalTiles) break;

    const tileInfo = tileData[tileIndex];
    const tile = document.createElement('a');
    tile.className = 'tile';
    tile.href = tileInfo.link;
    tile.style.backgroundColor = tileInfo.color;
    tile.innerHTML = `<i class="${tileInfo.icon}" style="color: ${tileInfo.iconColor};"></i><div>${tileInfo.title}</div>`;
    page.appendChild(tile);
  }

  tileContainer.appendChild(page);
}


function updateSliderButtons() {
  leftBtn.disabled = currentIndex === 0;
  rightBtn.disabled = currentIndex === pageCount - 1;
}

function slideTiles(direction) {
  currentIndex += direction;
  if (currentIndex < 0) currentIndex = 0;
  if (currentIndex >= pageCount) currentIndex = pageCount - 1;

  const offset = currentIndex * 100;
  tileContainer.style.transform = `translateX(-${offset}%)`;

  // Reset and restart animation on visible tiles
  document.querySelectorAll('.tile').forEach(tile => {
    tile.style.animation = 'none';
    void tile.offsetWidth;
    tile.style.animation = 'fadeSlideRise 1.4s ease-out';
  });

  updateSliderButtons();
}


leftBtn.addEventListener('click', () => slideTiles(-1));
rightBtn.addEventListener('click', () => slideTiles(1));

slideTiles(0);








const tileDaysEl = document.getElementById("tile-calendar-days");
const tileMonthYearEl = document.getElementById("tile-month-year");
let tileCurrentDate = new Date();

// Holiday list (YYYY-MM-DD format)
const holidays = {
  "2025-06-21": "Yoga Day 🧘",
  "2025-08-15": "Independence Day 🇮🇳",
  "2025-10-02": "Gandhi Jayanti 👓"
};

function renderTileCalendar(date) {
  const year = date.getFullYear();
  const month = date.getMonth();
  const today = new Date();
  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();

  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  tileMonthYearEl.textContent = `${monthNames[month]} ${year}`;
  tileDaysEl.innerHTML = "";

  for (let i = 0; i < firstDay; i++) {
    tileDaysEl.appendChild(document.createElement("div"));
  }

  let saturdayCount = 0;

  for (let day = 1; day <= lastDate; day++) {
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    const div = document.createElement("div");
    div.textContent = day;

    const dateObj = new Date(year, month, day);
    const weekday = dateObj.getDay();

    if (weekday === 0) {
      div.classList.add("sunday");
    }

    if (weekday === 6) {
      saturdayCount++;
      if (saturdayCount === 2 || saturdayCount === 4) {
        div.classList.add("saturday-red");
      }
    }

    if (
      day === today.getDate() &&
      month === today.getMonth() &&
      year === today.getFullYear()
    ) {
      div.classList.add("today");
    }

    if (holidays[dateStr]) {
      div.classList.add("holiday");
      const name = document.createElement("span");
      name.className = "holiday-name";
      name.textContent = holidays[dateStr];
      div.appendChild(name);
    }

    tileDaysEl.appendChild(div);
  }
}

function goToPrevMonth() {
  tileCurrentDate.setMonth(tileCurrentDate.getMonth() - 1);
  renderTileCalendar(tileCurrentDate);
}

function goToNextMonth() {
  tileCurrentDate.setMonth(tileCurrentDate.getMonth() + 1);
  renderTileCalendar(tileCurrentDate);
}

window.prevMonth = goToPrevMonth;
window.nextMonth = goToNextMonth;

renderTileCalendar(tileCurrentDate);


  function adjustSidebarHeight() {
    const sidebar = document.querySelector('.sidebar-scroll');
    const footer = document.querySelector('.footer-bar');

    if (!sidebar || !footer) return;

    const sidebarTop = sidebar.getBoundingClientRect().top + window.scrollY;
    const footerTop = footer.getBoundingClientRect().top + window.scrollY;

    const availableHeight = footerTop - sidebarTop - 15;

    sidebar.style.maxHeight = availableHeight + 'px';
  }

  window.addEventListener('load', adjustSidebarHeight);
  window.addEventListener('resize', adjustSidebarHeight);
  window.addEventListener('scroll', adjustSidebarHeight);


  </script>
</body>
</html>
