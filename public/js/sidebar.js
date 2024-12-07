document.addEventListener('DOMContentLoaded', function() {
    const body = document.querySelector('body');
    const sidebar = document.getElementById('Sidebar');
    const mainLayout = document.getElementById('main-layout');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const darkModeToggle = document.querySelector('.mode');
    const modeText = document.querySelector('.mode-text');

    // ตั้งค่าเริ่มต้นเป็นโหมดกลางวัน
    if(body.classList.contains('dark')) {
        body.classList.remove('dark');
    }
    modeText.innerText = 'โหมดกลางวัน';

    // Sidebar Toggle
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        mainLayout.classList.toggle('sidebar-collapsed');
        
        localStorage.setItem('sidebarState', 
            sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded'
        );
    });

    // โหลดสถานะ Sidebar
    const sidebarState = localStorage.getItem('sidebarState');
    if (sidebarState === 'collapsed') {
        sidebar.classList.add('collapsed');
        mainLayout.classList.add('sidebar-collapsed');
    }

    // Dark Mode Toggle
    darkModeToggle.addEventListener('click', () => {
        body.classList.toggle('dark');
        
        if(body.classList.contains('dark')) {
            modeText.innerText = 'โหมดกลางคืน';
        } else {
            modeText.innerText = 'โหมดกลางวัน';
        }
    });

    // สร้างและจัดการ overlay สำหรับ mobile
    const overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    document.body.appendChild(overlay);

    // ปิด sidebar เมื่อคลิก overlay
    overlay.addEventListener('click', () => {
        sidebar.classList.remove('collapsed');
        mainLayout.classList.remove('sidebar-collapsed');
        overlay.classList.remove('active');
    });
}); 