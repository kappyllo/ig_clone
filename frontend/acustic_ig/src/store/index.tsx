import { createStore } from "redux";

interface actionType {
  action: {};
  type: string;
  payload: string;
}

const loginReducer = (
  state = { logged: "no", payload: "" },
  action: actionType
) => {
  if (action.type === "login") {
    return {
      ...state,
      logged: "yes",
      name: action.payload,
    };
  }

  if (action.type === "logout") {
    return {
      ...state,
      logged: "no",
      name: "",
    };
  }

  return state;
};

const store = createStore(loginReducer);

export default store;
