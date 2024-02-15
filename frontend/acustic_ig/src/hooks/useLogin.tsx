const API_URL = import.meta.env.VITE_API_URL;
console.log(API_URL);

export default function useLogin(login: string, password: string) {
  async function fetchData() {
    const response = await fetch(API_URL, {
      body: JSON.stringify({
        email: login,
        password: password,
      }),
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*",
      },
    });
    const data = await response.json();
    console.log(data);
  }

  fetchData();
}
