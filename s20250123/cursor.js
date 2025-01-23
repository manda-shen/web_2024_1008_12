export class WeatherService {
    constructor() {
        this.API_KEY = '6b832a5bba9eb1ab8d9eb3ae4b1d9011'; // 替換成你的 OpenWeatherMap API 密鑰
        this.weatherWidget = document.getElementById('weatherWidget');
    }

    async updateWeather() {
        try {
            const position = await this.getCurrentPosition();
            const weatherData = await this.fetchWeatherData(position);
            this.renderWeather(weatherData);
        } catch (error) {
            this.handleError(error);
        }
    }

    async getCurrentPosition() {
        return new Promise((resolve, reject) => {
            if (!navigator.geolocation) {
                reject(new Error('瀏覽器不支援地理位置'));
                return;
            }
            navigator.geolocation.getCurrentPosition(resolve, reject);
        });
    }

    async fetchWeatherData(position) {
        const { latitude, longitude } = position.coords;
        const url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${this.API_KEY}&units=metric&lang=zh_tw`;

        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('天氣資料獲取失敗');
        }
        return await response.json();
    }

    renderWeather(data) {
        const weatherIcon = this.getWeatherIcon(data.weather[0].icon);
        this.weatherWidget.innerHTML = `
            <div class="weather-info">
                <span class="weather-icon">${weatherIcon}</span>
                <div>
                    <div class="temperature">${Math.round(data.main.temp)}°C</div>
                    <div class="description">${data.weather[0].description}</div>
                    <div class="humidity">濕度: ${data.main.humidity}%</div>
                </div>
            </div>
        `;
    }

    getWeatherIcon(code) {
        const icons = {
            '01d': '☀️',
            '02d': '⛅',
            '03d': '☁️',
            '04d': '☁️',
            '09d': '🌧️',
            '10d': '🌦️',
            '11d': '⛈️',
            '13d': '🌨️',
            '50d': '🌫️',
            '01n': '🌙',
            '02n': '☁️',
            '03n': '☁️',
            '04n': '☁️',
            '09n': '🌧️',
            '10n': '🌧️',
            '11n': '⛈️',
            '13n': '🌨️',
            '50n': '🌫️'
        };
        return icons[code] || '❓';
    }

    handleError(error) {
        console.error('Weather error:', error);
        this.weatherWidget.innerHTML = `
            <div class="weather-error">
                無法載入天氣資訊
                <div class="error-message">${error.message}</div>
            </div>
        `;
    }
}