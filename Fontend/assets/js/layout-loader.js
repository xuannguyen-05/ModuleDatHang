// File: Fontend/assets/js/layout-loader.js
// (Đây là file duy nhất bạn cần để tải layout và xử lý modal)

// Địa chỉ API Backend
const API_BASE_URL = 'http://localhost:8000/api';

/**
 * Chạy khi trang HTML tải xong
 */
document.addEventListener("DOMContentLoaded", function() {
    
    // Hàm tải HTML
    const loadHTML = (url, elementId) => {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                const element = document.getElementById(elementId);
                if (element) {
                    element.innerHTML = data;
                }
                
                // QUAN TRỌNG: Sau khi tải _header.html, chạy hàm initialize
                if (elementId === 'header-placeholder') {
                    // Hàm này chứa TẤT CẢ logic của header và modal
                    initializeHeaderAndModal(); 
                }
            })
            .catch(error => console.error(`Error loading ${url}:`, error));
    };

    // Tải Header và Footer
    loadHTML('_header.html', 'header-placeholder');
    loadHTML('_footer.html', 'footer-placeholder');
});

/**
 * HÀM "TẤT CẢ TRONG MỘT"
 * Chạy SAU KHI _header.html được tải xong.
 * Chứa logic của (layout-loader.js + auth-modal.js)
 */
function initializeHeaderAndModal() {
    
    // --- PHẦN 1: LOGIC HEADER (Kiểm tra đăng nhập) ---
    const token = localStorage.getItem('AUTH_TOKEN');
    const guestRegister = document.getElementById('guest-register-link');
    const guestLogin = document.getElementById('guest-login-link');
    const userMenu = document.getElementById('user-menu');
    const logoutButton = document.getElementById('logout-button');

    if (token) {
        // Đã đăng nhập
        if (guestRegister) guestRegister.style.display = 'none';
        if (guestLogin) guestLogin.style.display = 'none';
        if (userMenu) userMenu.style.display = 'list-item';
        
        fetchUserInfo(token); // Tải tên user

        if (logoutButton) {
            logoutButton.addEventListener('click', (e) => {
                e.preventDefault();
                localStorage.removeItem('AUTH_TOKEN');
                alert('Bạn đã đăng xuất.');
                window.location.href = 'index.html'; // Tải lại trang chủ (hoặc login.html)
            });
        }
    } else {
        // Chưa đăng nhập
        if (guestRegister) guestRegister.style.display = 'list-item';
        if (guestLogin) guestLogin.style.display = 'list-item';
        if (userMenu) userMenu.style.display = 'none';
    }

    // --- PHẦN 2: LOGIC MODAL (Lấy phần tử) ---
    const authModal = document.getElementById('auth-modal');
    // Nếu trang này không có modal (ví dụ: trang admin), thì dừng lại
    if (!authModal) { 
        console.log("Không tìm thấy auth-modal trên trang này.");
        return; 
    }

    const overlay = authModal.querySelector('.modal__overlay');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const gotoLoginBtn = document.getElementById('goto-login-btn');
    const gotoRegisterBtn = document.getElementById('goto-register-btn');
    const closeLoginBtn = document.getElementById('login-close-btn');
    const closeRegisterBtn = document.getElementById('register-close-btn');
    const loginSubmitBtn = document.getElementById('login-submit-btn');
    const registerSubmitBtn = document.getElementById('register-submit-btn');
    const loginErrorMsg = document.getElementById('login-error-message');
    const registerErrorMsg = document.getElementById('register-error-message');

    
    // --- PHẦN 3: LOGIC MODAL (Gắn sự kiện) ---
    
    // Hàm hiển thị/ẩn form
    function showModal(formType) {
        authModal.classList.remove('modal--hidden');
        if (formType === 'login') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }
    }

    function hideModal() {
        authModal.classList.add('modal--hidden');
    }

    // "SỬA LỖI": Gắn sự kiện cho nút header (chỉ được gọi sau khi header đã tải)
    if (guestLogin) {
        guestLogin.addEventListener('click', (e) => { 
            e.preventDefault(); 
            showModal('login'); 
        });
    }
    if (guestRegister) {
        guestRegister.addEventListener('click', (e) => { 
            e.preventDefault(); 
            showModal('register'); 
        });
    }

    // Gắn sự kiện cho các nút chuyển đổi và đóng
    if (gotoLoginBtn) gotoLoginBtn.addEventListener('click', () => showModal('login'));
    if (gotoRegisterBtn) gotoRegisterBtn.addEventListener('click', () => showModal('register'));
    if (overlay) overlay.addEventListener('click', hideModal);
    if (closeLoginBtn) closeLoginBtn.addEventListener('click', (e) => { e.preventDefault(); hideModal(); });
    if (closeRegisterBtn) closeRegisterBtn.addEventListener('click', (e) => { e.preventDefault(); hideModal(); });

    // --- PHẦN 4: LOGIC MODAL (Kết nối API) ---

    // Xử lý Submit Đăng nhập
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('login-username').value;
            const password = document.getElementById('login-password').value;
            
            if (!username || !password) {
                loginErrorMsg.innerText = 'Vui lòng nhập đầy đủ thông tin.';
                return;
            }

            loginSubmitBtn.innerText = 'ĐANG XỬ LÝ...';
            loginSubmitBtn.disabled = true;

            fetch(`${API_BASE_URL}/auth/login`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ username: username, password: password })
            })
            .then(handleApiResponse)
            .then(result => {
                localStorage.setItem('AUTH_TOKEN', result.body.token);
                alert('Đăng nhập thành công!');
                window.location.reload();
            })
            .catch(error => {
                loginErrorMsg.innerText = error.message;
            })
            .finally(() => {
                loginSubmitBtn.innerText = 'ĐĂNG NHẬP';
                loginSubmitBtn.disabled = false;
            });
        });
    }

    // Xử lý Submit Đăng kí
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // 1. SỬA LỖI: Lấy đúng ID "register-fullname" (chữ 'n' thường)
            const fullName = document.getElementById('register-fullname').value; 
            const email = document.getElementById('register-email').value;
            const username = document.getElementById('register-username').value;
            const password = document.getElementById('register-password').value;
            // Lấy trường "confirm"
            const passwordConfirm = document.getElementById('register-password-confirm').value;

            registerErrorMsg.innerText = '';
            registerSubmitBtn.innerText = 'ĐANG XỬ LÝ...';
            registerSubmitBtn.disabled = true;

            // Kiểm tra mật khẩu (phía client)
            if (password !== passwordConfirm) {
                registerErrorMsg.innerText = 'Mật khẩu nhập lại không khớp.';
                registerSubmitBtn.innerText = 'ĐĂNG KÍ';
                registerSubmitBtn.disabled = false;
                return;
            }
            // (Bạn có thể thêm validation khác ở đây)

            // 2. SỬA LỖI: Gửi data với key "fullName" (chữ 'N' hoa) đúng chuẩn API
            const registerData = {
                fullName: fullName, // <-- Key này phải khớp với API (fullName)
                email: email,
                username: username,
                password: password,
                password_confirmation: passwordConfirm // Laravel validation cần trường này
            };
            
            // 3. GỌI API (Đã đúng)
            fetch(`${API_BASE_URL}/auth/register`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(registerData)
            })
            .then(handleApiResponse) // (Hàm này sẽ xử lý lỗi 422 từ Laravel)
            .then(result => {
                alert('Đăng kí thành công! Vui lòng đăng nhập.');
                showModal('login'); // Tự động chuyển sang form login
            })
            .catch(error => {
                registerErrorMsg.innerHTML = error.message; // Dùng innerHTML để render lỗi 422
            })
            .finally(() => {
                registerSubmitBtn.innerText = 'ĐĂNG KÍ';
                registerSubmitBtn.disabled = false;
            });
        });
    }
}

/**
 * Hàm xử lý phản hồi API (Giữ nguyên từ code trước)
 */
async function handleApiResponse(response) {
    const result = await response.json().then(data => ({ status: response.status, body: data }));
    if (response.ok) {
        return result;
    }
    let errorMessage = 'Đã có lỗi xảy ra.';
    if (result.status === 422) {
        const errors = result.body.errors;
        errorMessage = Object.values(errors).map(msg => `<li>${msg[0]}</li>`).join('');
        errorMessage = `<ul>${errorMessage}</ul>`;
    } else if (result.body.message) {
        errorMessage = result.body.message;
    }
    throw new Error(errorMessage);
}

/**
 * Hàm lấy thông tin user (Giữ nguyên từ code trước)
 */
function fetchUserInfo(token) {
    fetch(`${API_BASE_URL}/auth/me`, {
        method: 'GET',
        headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}` }
    })
    .then(response => {
        if (!response.ok) throw new Error('Token không hợp lệ.');
        return response.json();
    })
    .then(user => {
        const userNameElement = document.getElementById('header-user-name');
        if (userNameElement && user.fullName) {
            userNameElement.innerText = user.fullName;
        }
    })
    .catch(error => {
        console.error('Không thể lấy thông tin user:', error.message);
        localStorage.removeItem('AUTH_TOKEN');
        window.location.href = 'index.html'; // Tải lại trang để về trạng thái "guest"
    });
}