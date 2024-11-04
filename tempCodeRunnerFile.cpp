#include <iostream>

struct Node {
  int key;
  Node* next;
};

class HashTable {
 public:
  HashTable(int size) {
    buckets_ = new Node*[size];
    for (int i = 0; i < size; i++) {
      buckets_[i] = nullptr;
    }
  }

  ~HashTable() {
    for (int i = 0; i < size(); i++) {
      Node* node = buckets_[i];
      while (node != nullptr) {
        Node* next = node->next;
        delete node;
        node = next;
      }
    }
    delete[] buckets_;
  }

  void Insert(int key) {
    int index = Hash(key);
    Node* node = new Node{key, nullptr};
    if (buckets_[index] == nullptr) {
      buckets_[index] = node;
    } else {
      Node* head = buckets_[index];
      while (head->next != nullptr) {
        head = head->next;
      }
      head->next = node;
    }
  }

  bool Find(int key) {
    int index = Hash(key);
    Node* node = buckets_[index];
    while (node != nullptr) {
      if (node->key == key) {
        return true;
      }
      node = node->next;
    }
    return false;
  }

 private:
  int size() const { return static_cast<int>(buckets_.size()); }

  int Hash(int key) { return key % size(); }

  Node** buckets_;
};

int main() {
  HashTable hash_table(10);
  hash_table.Insert(9);
  hash_table.Insert(5);
  hash_table.Insert(7);
  hash_table.Insert(29);
  hash_table.Insert(35);
  hash_table.Insert(12);
  hash_table.Insert(37);
  hash_table.Insert(19);

  std::cout << "Khóa 9 có tồn tại trong bảng băm không? " << std::boolalpha << hash_table.Find(9) << std::endl;
  std::cout << "Khóa 10 có tồn tại trong bảng băm không? " << std::boolalpha << hash_table.Find(10) << std::endl;

  return 0;
}
