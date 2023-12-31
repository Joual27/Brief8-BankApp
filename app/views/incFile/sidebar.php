

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-black">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="<?php echo URLROOT?>/admin/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/dashboard.png" alt="">

               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <a href="<?php echo URLROOT?>/admin/banksDashboard">
                      <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/bank.png" alt="">
                  </a>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Banks</span>
                 
            </button>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/agency.png" alt="">

               <span class="flex-1 ms-3 whitespace-nowrap">Agency</span>
            </a>
         </li>
         <li>
            <a href="<?php echo URLROOT?>/admin/transactionsDashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/atm.png" alt="">

               <span class="flex-1 ms-3 whitespace-nowrap">ATM</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/accounts.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Accounts</span>
            </a>
         </li>
         <li>
            <a href="<?php echo URLROOT?>/admin/accountsDashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/transactions.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Transactions</span>
            </a>
         </li>
         <li>
            <a href="<?php echo URLROOT?>/admin/userDashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/profile.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img class="w-[30px]" src="<?php echo URLROOT ?>/pics/logout.png" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
            </a>
         </li>
      </ul>
   </div>
</aside>


