import { act } from "react-dom/test-utils";
import { createStore } from "redux";

interface actionType {
  action: {};
  type: string;
}

const loginReducer = (state = { logged: "no" }, action: actionType) => {
  if (action.type === "login") {
    return {
      logged: "yes",
    };
  }

  if (action.type === "logout") {
    return {
      logged: "no",
    };
  }
};

const store = createStore(loginReducer);
