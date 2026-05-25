(function() {
    function getCurrentLang() {
        return window.location.pathname.includes('/vi') ? 'vi' : 'en';
    }

    function getWeatherState(weatherCode, isDay) {
        if (weatherCode === 0) {
            return isDay ? 'sunny.svg' : 'clear_sky.svg';
        }
        if (weatherCode === 1) {
            return isDay ? 'mid clear day.svg' : 'mid clear night.svg';
        }
        if ([2, 3].includes(weatherCode)) {
            if (weatherCode === 3) return 'cloud.svg';
            return isDay ? 'sun_cloud.svg' : 'cloudy_night.svg';
        }
        if (weatherCode === 45) {
            return 'foggy.svg';
        }
        if (weatherCode === 48) {
            return 'cloud.svg';
        }
        if ([51, 61].includes(weatherCode)) {
            return 'mid Rain.svg';
        }
        if ([53, 55, 63, 65, 80, 81, 82].includes(weatherCode)) {
            return 'rain.svg';
        }
        if ([95, 96, 99].includes(weatherCode)) {
            return 'rain_thunder.svg';
        }

        return 'sun.svg';
    }

    const descMap = {
        0: { vi: 'Trời quang', en: 'Clear sky' },
        1: { vi: 'Ít mây', en: 'Mainly clear' },
        2: { vi: 'Mây rải rác', en: 'Partly cloudy' },
        3: { vi: 'U ám', en: 'Overcast' },
        45: { vi: 'Sương mù', en: 'Foggy' },
        48: { vi: 'Sương muối', en: 'Depositing rime fog' },
        51: { vi: 'Mưa phùn nhẹ', en: 'Light drizzle' },
        53: { vi: 'Mưa phùn vừa', en: 'Moderate drizzle' },
        55: { vi: 'Mưa phùn dày', en: 'Dense drizzle' },
        61: { vi: 'Mưa nhẹ', en: 'Slight rain' },
        63: { vi: 'Mưa vừa', en: 'Moderate rain' },
        65: { vi: 'Mưa to', en: 'Heavy rain' },
        80: { vi: 'Mưa rào nhẹ', en: 'Slight rain showers' },
        81: { vi: 'Mưa rào vừa', en: 'Moderate rain showers' },
        82: { vi: 'Mưa rào dữ dội', en: 'Violent rain showers' },
        95: { vi: 'Giông bão', en: 'Thunderstorm' },
        96: { vi: 'Giông bão + mưa đá nhẹ', en: 'Thunderstorm with slight hail' },
        99: { vi: 'Giông bão + mưa đá dữ dội', en: 'Thunderstorm with heavy hail' }
    };

    async function updateWeatherCard(cardElement, rootElement) {
        const query = cardElement.getAttribute('data-city');
        const cityId = cardElement.id.split('-').pop();
        const iconRootPath = rootElement.getAttribute('data-icon-root');
        const lang = getCurrentLang();

        const iconElement = document.getElementById(`icon-${cityId}`);
        const tempElement = document.getElementById(`temp-${cityId}`);
        const conditionElement = document.getElementById(`condition-${cityId}`);

        if (!query || !iconElement || !tempElement || !conditionElement) {
            console.error('Thiếu thuộc tính hoặc phần tử UI.');
            return;
        }

        const params = new URLSearchParams(query);
        params.set('current', 'temperature_2m,is_day,weather_code');
        params.set('timezone', 'auto');
        const url = `https://api.open-meteo.com/v1/forecast?${params.toString()}`;

        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const data = await response.json();
            const currentTemp = Math.round(Number(data.current.temperature_2m));
            const weatherCode = Number(data.current.weather_code);
            const isDay = Number(data.current.is_day) === 1;

            if (!Number.isFinite(currentTemp) || !Number.isFinite(weatherCode)) {
                throw new Error('Incomplete current weather response');
            }

            iconElement.src = iconRootPath + getWeatherState(weatherCode, isDay);
            tempElement.textContent = `${currentTemp}°C`;
            conditionElement.textContent = (descMap[weatherCode] && descMap[weatherCode][lang]) || 'Bình thường';
        } catch (error) {
            console.error('Lỗi khi lấy dữ liệu thời tiết:', error);
            iconElement.src = iconRootPath + 'error.svg';
            tempElement.textContent = 'Lỗi';
            conditionElement.textContent = 'Không khả dụng';
        }
    }

    function initWeather() {
        const rootElement = document.getElementById('weather-data-root');
        if (!rootElement) return;

        rootElement.querySelectorAll(':scope > div').forEach(card => {
            updateWeatherCard(card, rootElement);
        });
    }

    document.addEventListener('DOMContentLoaded', initWeather);
})();
