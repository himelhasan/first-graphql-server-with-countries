const { UserList } = require("../FakeData");

const resolvers = {
  Query: {
    // USER RESOLVERS

    users() {
      return UserList;
    },
  },
};

module.exports = { resolvers };
