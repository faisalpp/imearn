 <style>
     .user_menu {
         z-index: 10;
         display: grid;
         grid-template-columns: 1fr 90px 1fr;
         gap: 10px;
     }

     .user_menu .user_menu_item {
         color: white;
         display: flex;
         flex-direction: column;
         align-items: center;
         gap: 2px;
         font-size: 12px;
     }

     .main_user_menu_item {
         width: 86px;
         height: 86px;
         border-radius: 50%;
         border: 11px solid #343435;
         margin: -40px;
     }
 </style>
 <div class="user_menu position-fixed bottom-0 start-0 end-0 bg-primaryColor pt-4 pb-3 px-4 d-md-none">
     <div class="d-flex justify-content-evenly gap-2">
         <button class="user_menu_item btn p-0 m-0" type="button">
             <svg xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 31 25" fill="none">
                 <path d="M1 23.1663V21.8624C1 16.8215 5.13119 12.7351 10.2273 12.7351C15.3233 12.7351 19.4545 16.8215 19.4545 21.8624V23.1663" stroke="#00A2FE" stroke-width="2" stroke-linecap="round" />
                 <path d="M16.8182 15.3429C16.8182 11.7423 19.7691 8.82336 23.4091 8.82336C27.0492 8.82336 30 11.7423 30 15.3429V15.9948" stroke="#00A2FE" stroke-width="2" stroke-linecap="round" />
                 <path d="M10.2272 12.7351C13.1392 12.7351 15.4999 10.3999 15.4999 7.51949C15.4999 4.63899 13.1392 2.30389 10.2272 2.30389C7.31514 2.30389 4.95447 4.63899 4.95447 7.51949C4.95447 10.3999 7.31514 12.7351 10.2272 12.7351Z" stroke="#00A2FE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                 <path d="M23.409 8.82339C25.5931 8.82339 27.3636 7.07206 27.3636 4.91169C27.3636 2.75133 25.5931 1 23.409 1C21.2249 1 19.4545 2.75133 19.4545 4.91169C19.4545 7.07206 21.2249 8.82339 23.409 8.82339Z" stroke="#00A2FE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <span>Team</span>
         </button>
         <button class="user_menu_item btn p-0 m-0" type="button">
             <svg xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 26 23" fill="none">
                 <path d="M9.24611 7.30956L12.1034 1.55414C12.4701 0.815288 13.5299 0.815288 13.8966 1.55414L16.7539 7.30956L23.1436 8.23818C23.9635 8.35732 24.2902 9.35934 23.6967 9.93408L19.0739 14.411L20.1648 20.7355C20.305 21.5478 19.4475 22.1671 18.7139 21.7835L13 18.7958L7.28602 21.7835C6.55246 22.1671 5.695 21.5478 5.8351 20.7355L6.92607 14.411L2.30333 9.93408C1.70979 9.35934 2.03654 8.35732 2.85637 8.23818L9.24611 7.30956Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <span>Rank</span>
         </button>
     </div>
     <a href="{{ url('/') }}">
         <div class="bg-secondaryColor main_user_menu_item mx-auto d-flex justify-content-center align-items-center">
             <svg xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 26 25" fill="none">
                 <path d="M19.1111 23.1722H6.88889C4.18883 23.1722 2 20.9833 2 18.2833V10.5926C2 8.88305 2.89297 7.29769 4.35497 6.41162L10.4661 2.70792C12.0236 1.76403 13.9764 1.76403 15.5339 2.70792L21.645 6.41162C23.107 7.29769 24 8.88305 24 10.5926V18.2833C24 20.9833 21.8111 23.1722 19.1111 23.1722Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                 <path d="M9.33337 18.2833H16.6667" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
             </svg>
         </div>
     </a>
     <div class="d-flex justify-content-evenly gap-2">
         <button class="user_menu_item btn p-0 m-0" type="button">
             <svg xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 29 27" fill="none">
                 <path d="M24.3629 25.8231H3.92036C2.30749 25.8231 1 24.5156 1 22.9027V9.76109C1 8.14822 2.30749 6.84073 3.92036 6.84073H24.3629C25.9758 6.84073 27.2832 8.14822 27.2832 9.76109V22.9027C27.2832 24.5156 25.9758 25.8231 24.3629 25.8231Z" stroke="white" stroke-width="2" />
                 <path d="M6.84082 6.84071V1.87611C6.84082 1.39225 7.23307 1 7.71693 1H20.5665C21.0504 1 21.4426 1.39225 21.4426 1.87611V6.84071" stroke="white" stroke-width="2" />
                 <path d="M11.2213 1V6.84071" stroke="white" stroke-width="2" />
                 <path d="M14.1416 1V6.84071" stroke="white" stroke-width="2" />
                 <path d="M20.7124 17.062C20.3092 17.062 19.9823 16.7351 19.9823 16.3319C19.9823 15.9287 20.3092 15.6018 20.7124 15.6018C21.1155 15.6018 21.4425 15.9287 21.4425 16.3319C21.4425 16.7351 21.1155 17.062 20.7124 17.062Z" fill="black" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <span>Wallet</span>
         </button>
         <button class="user_menu_item btn p-0 m-0" type="button">
             <svg xmlns="http://www.w3.org/2000/svg" width="31" height="25" viewBox="0 0 29 28" fill="none">
                 <path d="M14.5184 1C7.33873 1 1.51843 6.82029 1.51843 14C1.51843 21.1796 7.33873 27 14.5184 27C21.6981 27 27.5184 21.1796 27.5184 14C27.5184 6.82029 21.6981 1 14.5184 1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                 <path d="M4.4707 22.2494C4.4707 22.2494 7.36843 18.55 14.5184 18.55C21.6684 18.55 24.5662 22.2494 24.5662 22.2494" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                 <path d="M14.5184 14C16.6724 14 18.4184 12.254 18.4184 10.1C18.4184 7.94611 16.6724 6.20001 14.5184 6.20001C12.3644 6.20001 10.6184 7.94611 10.6184 10.1C10.6184 12.254 12.3644 14 14.5184 14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <span>Profile</span>
         </button>
     </div>
 </div>
