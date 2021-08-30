const jsonData = [];
fetch("./messageData.json")
  .then((res) => res.json())
  .then((data) => {
    jsonData.push(...data.messages);
  });

let originMessage, editPage, editPageTextarea, thisKey, pre, editTime;

function edit(e) {
  if (!Array.from(e.target.classList).includes("edit")) {
    return;
  }
  originMessage = this.querySelector(".text pre");
  editPage = this.querySelector(".edit_page");
  editPageTextarea = this.querySelector(".edit_page textarea");
  editPage.style.transform = "translateX(0%)";
  editPageTextarea.value = originMessage.innerHTML;
  thisKey = this.getAttribute("key");
  pre = this.querySelector("pre");
  editTime = this.querySelector("span.editTime");
}

const messages = document.querySelectorAll(".message");
messages.forEach((message) => {
  message.addEventListener("click", edit);
});

function editCallPHP() {
  fetch("./post.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData.get("messages")),
  })
    .then((res) => console.log(res))
    .catch((err) => console.log(err));
}

const formData = new FormData();
const editSubmits = document.querySelectorAll(".edit_page button");
editSubmits.forEach((editSubmit) => {
  editSubmit.addEventListener("click", function () {
    pre.innerText = editPageTextarea.value;
    jsonData[thisKey].message = editPageTextarea.value;

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth() + 1;
    const day = now.getDate();
    const hour = now.getHours();
    const min = now.getMinutes();
    const time = `${year}-${
      month < 10 ? "0" + month : month
    }-${day} ${hour}:${min}`;
    editTime.innerText = "Edit : " + time;
    jsonData[thisKey].EditTime = time;
    formData.set("messages", JSON.stringify(jsonData));

    editCallPHP();
  });
});
